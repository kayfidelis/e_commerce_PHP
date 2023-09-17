-- criaão do banco de dados--
create database Skate_Shop;
use Skate_Shop;
-- ?? --

-- começo da criação das tabelas -- 
create table tbl_categoria
(	
    cd_categoria int primary key auto_increment,
    ds_categoria varchar(25) not null    
);
create table tbl_marca
(	
    cd_marca int primary key auto_increment,
    nm_marca varchar(45) not null    
);
create table tbl_produto 
(	
    cd_produto int primary key auto_increment,
    cd_categoria int not null,
    nm_produto varchar(70) not null,
    cd_marca int not null,
    vl_preco decimal(6,2) not null,
    qt_estoque int not null,
    img_produto varchar(255) not null,
    sg_lançamento enum ('S','N') not null,
    constraint fk_cat foreign key(cd_categoria) references tbl_categoria(cd_categoria),
    constraint fk_autor foreign key(cd_marca) references tbl_marca(cd_marca)
);
-- fim da criação das tabelas -- 


-- começo dos inserts -- 
-- isert na tabela categoria -- 
drop procedure if exists inserir;
delimiter $$
create procedure inserir (
  in p_ds_categoria varchar(25) 
)
begin 
	 insert into tbl_categoria(ds_categoria) 
	 values (p_ds_categoria);
end $$
delimiter ;

call inserir ("shape 8.0");
call inserir ("shape 8.25");
call inserir ("truck 129mm");
call inserir ("truck 139mm");
call inserir ("lixa importada");
call inserir ("lixa nacional");
call inserir ("roda 53mm");
call inserir ("roda 55mm");
call inserir ("Rolamento");
call inserir ("Parafuso");
-- fim dos iserts na tabela categoria -- 


-- começo dos iserts na tabela marca -- 
drop procedure if exists inserir_marca;
delimiter $$
create procedure inserir_marca (
  in p_nm_marca varchar(45)
)
begin 
	insert into tbl_marca(nm_marca) 
	values (p_nm_marca);
end $$
delimiter ;

call inserir_marca ("Element");
call inserir_marca ("April");
call inserir_marca ("Independent");
call inserir_marca ("Silver");
call inserir_marca ("Grizzly");
call inserir_marca ("Nacional");
call inserir_marca ("Moska");
call inserir_marca ("Black Sheep");
call inserir_marca ("Red Bones");
-- fim dos iserts na tabela marca -- 

-- começo dos iserts na tabela shapes -- 
drop procedure if exists inserir_produto;
delimiter $$
create procedure inserir_produto (
  in p_cd_categoria int,
  in p_cd_marca int,
  in p_nm_produto varchar(70),
  in p_vl_preco decimal(6,2),
  in p_qt_estoque int,
  in p_img_produto varchar(255),
  in p_sg_lançamento enum ('S','N')
)
begin 
	insert into tbl_produto(cd_categoria, cd_marca, nm_produto, vl_preco, qt_estoque, img_produto, sg_lançamento) 
    values (p_cd_categoria, p_cd_marca, p_nm_produto, p_vl_preco, p_qt_estoque, p_img_produto, p_sg_lançamento);
end $$
delimiter ;

call inserir_produto ('1','1',"Element Blazin white", '340.90', '45', "Blazin white",'N');
call inserir_produto ('4','3',"Truck Independent Tiago Lemos", '800.00', '15', "TRUCK INDEPENDENT PRO TIAGO LEMOS",'S');
call inserir_produto ('5','5',"Lixa Grizzly Stamp", '90.00', '110', "Lixa Grizzly Stamp",'N');
call inserir_produto ('9','9',"Rolamento Red Bones", '180.00', '15', "Rolamento Red Bones",'N');
call inserir_produto ('1','2',"April shane o'neill", '380.00', '0', "shane o'neill",'N');
call inserir_produto ('7','7',"Roda Moska Rock", '180.00', '78', "Roda Moska Rock",'s');
call inserir_produto ('5','5',"Lixa Grizzly Fungi", '109.99', '0', "Lixa Grizzly Fungi",'S');
call inserir_produto ('3','3',"Truck Independent Polished", '599.99', '28', "Truck Independent Polished",'N');
call inserir_produto ('10','8',"Parafuso De Base Black Sheep Gold", '32.00', '60', "Parafuso De Base Black Sheep Gold",'N');
call inserir_produto ('1','2',"April Rayssa Leal", '400.00', '30', "RAYSSA LEAL BLACK",'S');
call inserir_produto ('9','9',"Rolamento Bones Swiss", '480.00', '50', "Rolamento Bones Swiss",'S');
call inserir_produto ('10','3',"Parafuso De Base Independent Gold", '45.00', '47', "Parafuso De Base Independent Gold",'S');
call inserir_produto ('5','5',"Lixa Grizzly Red", '100.00', '92', "Lixa Grizzly Red",'N');
call inserir_produto ('3','4',"Truck Silver M Hollow Blk", '450.00', '0', "Truck Silver M Hollow Blk",'N');
call inserir_produto ('6','6',"Lixa Nacional", '14.90', '214', "Lixa Nacional",'N');
call inserir_produto ('7','8',"Roda Black Sheep", '100.00', '0', "Roda Black Sheep",'N');
call inserir_produto ('2','1',"Element Alcala", '339.90', '55', "Alcala",'N');
call inserir_produto ('8','8',"Roda Black Sheep Tubo", '120.00', '114', "Roda Black Sheep Tubo",'N');
call inserir_produto ('9','8',"Rolamento Black Sheep Gold", '80.00', '0', "Rolamento Black Sheep Gold",'S');
call inserir_produto ('10','8',"Parafuso De Base Black Sheep", '16.90', '112', "Parafuso De Base Black Sheep",'N');
call inserir_produto ('4','4',"Truck Silver Raw", '400.00', '9', "Truck Silver Raw",'N');
call inserir_produto ('10','3',"Parafuso De Base Independent", '35.00', '0', "Parafuso De Base Independent",'N');
call inserir_produto ('9','8',"Rolamento Black Sheep Black", '60.00', '15', "Rolamento Black Sheep Black",'N');
call inserir_produto ('8','7',"Roda Moska Rock Black", '200.00', '56', "Roda Moska Rock Black",'N');

-- fim dos iserts na tabela shapes -- 
-- fim dos inserts -- 


-- select -- 
create view vw_produto as 
select 
	tbl_produto.cd_produto,
    tbl_categoria.ds_categoria,
    tbl_marca.nm_marca,
    tbl_produto.nm_produto,
    tbl_produto.vl_preco,
    tbl_produto.qt_estoque,
    tbl_produto.img_produto,
    tbl_produto.sg_lançamento
from tbl_produto inner join  tbl_marca 
on  tbl_produto.cd_marca = tbl_marca.cd_marca
inner join tbl_categoria 
on tbl_produto.cd_categoria = tbl_categoria.cd_categoria;

select * from vw_produto;

select nm_produto, vl_preco, img_produto from vw_produto where ds_categoria = 'shape';