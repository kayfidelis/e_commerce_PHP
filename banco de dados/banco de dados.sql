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
create table tbl_shapes
(	
    cd_shape int primary key auto_increment,
    cd_categoria int not null,
    nm_shape varchar(70) not null,
    cd_marca int not null,
    vl_preco decimal(6,2) not null,
    qt_estoque int not null,
    img_shape varchar(255) not null,
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
call inserir ("shape 7.75");
call inserir ("shape 7.0");
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
call inserir_marca ("DGK");
call inserir_marca ("Primitive");
-- fim dos iserts na tabela marca -- 


-- começo dos iserts na tabela shapes -- 
drop procedure if exists inserir_shape;
delimiter $$
create procedure inserir_shape (
  in p_cd_categoria int,
  in p_cd_marca int,
  in p_nm_shape varchar(70),
  in p_vl_preco decimal(6,2),
  in p_qt_estoque int,
  in p_img_shape varchar(255),
  in p_sg_lançamento enum ('S','N')
)
begin 
	insert into tbl_shapes(cd_categoria, cd_marca, nm_shape, vl_preco, qt_estoque, img_shape, sg_lançamento) 
    values (p_cd_categoria, p_cd_marca, p_nm_shape, p_vl_preco, p_qt_estoque, p_img_shape, p_sg_lançamento);
end $$
delimiter ;

call inserir_shape ('1','1',"Element Blazin white", '340.90', '45', "Blazin white",'N');
call inserir_shape ('2','1',"Element Alcala", '339.90', '45', "Alcala",'N');
call inserir_shape ('1','2',"April shane o'neill", '380.00', '45', "shane o'neill",'N');
call inserir_shape ('1','2',"April RAYSSA LEAL BLACK", '400.00', '45', "RAYSSA LEAL BLACK",'S');
call inserir_shape ('2','3',"DGK Ghetto Psych", '480.90', '45', "Ghetto Psych",'N');
call inserir_shape ('4','3',"DGK", '320.00', '45', "DGK",'N');
call inserir_shape ('1','4',"Primitive Paul Rodriguez", '500.00', '45', "Paul Rodriguez",'S');
call inserir_shape ('2','4',"Primitive Tiago Lemos", '500.00', '45', "Tiago Lemos",'S');
-- fim dos iserts na tabela shapes -- 
-- fim dos inserts -- 


-- select -- 
create view vw_shape as 
select 
	tbl_shapes.cd_shape,
    tbl_categoria.ds_categoria,
    tbl_marca.nm_marca,
    tbl_shapes.nm_shape,
    tbl_shapes.vl_preco,
    tbl_shapes.qt_estoque,
    tbl_shapes.img_shape,
    tbl_shapes.sg_lançamento
from tbl_shapes inner join  tbl_marca 
on  tbl_shapes.cd_marca = tbl_marca.cd_marca
inner join tbl_categoria 
on tbl_shapes.cd_categoria = tbl_categoria.cd_categoria;
    
select * from vw_shape;
-- fim do select -- 


	