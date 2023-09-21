-- criaão do banco de dados--
create database Skate_Shop;
use Skate_Shop;
-- ?? --

-- criando usuário -- 
CREATE USER 'Kayque'@'localhost' IDENTIFIED WITH mysql_native_password BY '12345678';
 GRANT ALL PRIVILEGES ON Skate_Shop.* TO 'Kayque'@'localhost' WITH GRANT OPTION;
 -- usuário criado -- 
 
 
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
    descrição varchar (255) not null,
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

call inserir ("shape");
call inserir ("truck");
call inserir ("lixa");
call inserir ("roda");
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
  in p_sg_lançamento enum ('S','N'),
  in p_descrição varchar (255)
)
begin 
	insert into tbl_produto(cd_categoria, cd_marca, nm_produto, vl_preco, qt_estoque, img_produto, sg_lançamento, descrição) 
    values (p_cd_categoria, p_cd_marca, p_nm_produto, p_vl_preco, p_qt_estoque, p_img_produto, p_sg_lançamento, p_descrição);
end $$
delimiter ;

call inserir_produto ('1','1',"Element Blazin white", '340.90', '45', "Blazin white.jpg",'N','Shape Element Blazin white. Maple canadense Tamanho: 8.25.');
call inserir_produto ('2','3',"Truck Independent Tiago Lemos", '800.00', '15', "TRUCK INDEPENDENT PRO TIAGO LEMOS.jpg",'S', 'Truck Independent Tiago Lemos. Edição Limitada do Skatista profissional Tiago Lemos. Medida: 139mm.');
call inserir_produto ('3','5',"Lixa Grizzly Stamp", '90.00', '110', "Lixa Grizzly Stamp.jpg",'N', 'Lixa Grizzly Stamp. Lixa emborrachada com estampa simples.');
call inserir_produto ('5','9',"Rolamento Red Bones", '180.00', '15', "Rolamento Red Bones.jpg",'N', 'Rolamento Red Bones. Rolamento com esferas metálicas e devidamente lubrificadas.');
call inserir_produto ('1','2',"April shane o'neill", '380.00', '0', "shane o'neill.jpg",'N',"Shape April shane o'neill. Pro Model do skatista Shane O'neill. Tamanho: 8.25. ");
call inserir_produto ('4','7',"Roda Moska Rock", '180.00', '78', "Roda Moska Rock.jpg",'S','Roda Moska Rock. Roda STF. Medida: 55mm.');
call inserir_produto ('3','5',"Lixa Grizzly Fungi", '109.99', '0', "Lixa Grizzly Fungi.jpg",'S','Lixa Grizzly Fungi. Lixa emborrachada edição limitada.');
call inserir_produto ('2','3',"Truck Independent Polished", '599.99', '28', "Truck Independent Polished.jpg",'N','Truck Independent Polished. Truck importado e com boa durabilidade. Medida: 129mm.');
call inserir_produto ('6','8',"Parafuso De Base Black Sheep Gold", '32.00', '60', "Parafuso De Base Black Sheep Gold.jpg",'N','Parafuso De Base Black Sheep Gold. Edição limitada ideal para qualquer skate.');
call inserir_produto ('1','2',"April Rayssa Leal", '400.00', '30', "RAYSSA LEAL BLACK.jpg",'S','Shape April Rayssa Leal. Pro Model da skatista Rayssa Leal. Tamanho: 7.75.');
call inserir_produto ('5','9',"Rolamento Bones Swiss", '480.00', '50', "Rolamento Bones Swiss.jpg",'S','Rolamento Bones Swiss. Rolamento com esferas de cerâmica.');
call inserir_produto ('6','3',"Parafuso De Base Independent Gold", '45.00', '47', "Parafuso De Base Independent Gold.jpg",'S', 'Parafuso De Base Independent Gold. Edição limitada.');
call inserir_produto ('3','5',"Lixa Grizzly Red", '100.00', '92', "Lixa Grizzly Red.jpg",'N','Lixa Grizzly Red. Lixa emborrachada com estampa simples.');
call inserir_produto ('2','4',"Truck Silver M Hollow Blk", '450.00', '0', "Truck Silver M Hollow Blk.jpg",'N', 'Truck Silver M Hollow Blk. Truck vazado no parafuso central. Medida: 149mm');
call inserir_produto ('3','6',"Lixa Nacional", '14.90', '214', "Lixa Nacional.jpg",'N','Lixa Nacional. Lixa de papel ideal para qualquer skate.');
call inserir_produto ('4','8',"Roda Black Sheep", '100.00', '0', "Roda Black Sheep.jpg",'N', 'Roda Black Sheep. Roda STF. Medida: 53mm.');
call inserir_produto ('1','1',"Element Alcala", '339.90', '55', "Alcala.jpg",'N','Shape Element Alcala. Maple Chines. Tamnho: 8.0.');
call inserir_produto ('4','8',"Roda Black Sheep Tubo", '120.00', '114', "Roda Black Sheep Tubo.jpg",'N', 'Roda Black Sheep Tubo. Roda STF. Medida: 52mm. ');
call inserir_produto ('5','8',"Rolamento Black Sheep Gold", '80.00', '0', "Rolamento Black Sheep Gold.jpg",'S','Rolamento Black Sheep Gold. Edição limitada com esferas metalicas.');
call inserir_produto ('6','8',"Parafuso De Base Black Sheep", '16.90', '112', "Parafuso De Base Black Sheep.jpg",'N','Parafuso De Base Black Sheep. Ideal para qualquer skate.');
call inserir_produto ('2','4',"Truck Silver Raw", '400.00', '9', "Truck Silver Raw.jpg",'N','Truck Silver Raw. Truck nacional com boa durabilidade. Medida: 139mm.');
call inserir_produto ('6','3',"Parafuso De Base Independent", '35.00', '0', "Parafuso De Base Independent.jpg",'N', 'Parafuso De Base Independent. Parafuso importado ideal para qualquer skate.');
call inserir_produto ('5','8',"Rolamento Black Sheep Black", '60.00', '15', "Rolamento Black Sheep Black.jpg",'N','Rolamento Black Sheep Black. Rolamento com esferas metálicas e devidamente lubrificadas');
call inserir_produto ('4','7',"Roda Moska Rock Black", '200.00', '56', "Roda Moska Rock Black.jpg",'N', 'Roda STF. Medida: 53mm');
-- fim dos iserts na tabela shapes -- 


-- criando view -- 
create view vw_produto as 
select 
	tbl_produto.cd_produto,
    tbl_categoria.ds_categoria,
    tbl_marca.nm_marca,
    tbl_produto.nm_produto,
    tbl_produto.vl_preco,
    tbl_produto.qt_estoque,
    tbl_produto.img_produto,
    tbl_produto.sg_lançamento,
    tbl_produto.descrição
from tbl_produto inner join  tbl_marca 
on  tbl_produto.cd_marca = tbl_marca.cd_marca
inner join tbl_categoria 
on tbl_produto.cd_categoria = tbl_categoria.cd_categoria;
select * from vw_produto;
-- view criada -- 


-- criando tabela Usuário --
create table tbl_Usuario(
	cd_Usuario int primary key auto_increment,
    nm_Usuario varchar (80) not null,
    ds_Email varchar (80) not null,
    ds_Senha varchar (6) not null,
    ds_Status boolean not null,
    ds_Endereço varchar (80) not null,
    ds_Cidade varchar (30) not null,
    no_Cep char (9) not null
); 
-- tabela criada -- 
select * from tbl_Usuario;

-- inserindo dados na tabela usuário -- 
drop procedure if exists inserir_Usuario;
delimiter $$
create procedure inserir_Usuario(
	in p_nm_Usuario varchar (80),
    in p_ds_Email varchar (80),
    in p_ds_Senha varchar (6),
    in p_ds_Status boolean,
    in p_ds_Endereço varchar (80),
    in p_ds_Cidade varchar (30),
    in p_no_Cep char (9)
)
begin 
	insert into tbl_Usuario(nm_Usuario, ds_Email, ds_Senha, ds_Status, ds_Endereço, ds_Cidade, no_Cep)
	values (p_nm_Usuario, p_ds_Email, p_ds_Senha, p_ds_Status, p_ds_Endereço, p_ds_Cidade, p_no_Cep);
end $$ 
delimiter ;

call inserir_Usuario('Kayque Rodrigues', 'kayque@gmail.com', '123456', 1 ,'Rua Santo Antonio, 43', 'São Paulo', '05489-052');
call inserir_Usuario('Adriano Nascimento', 'Adriano@gmail.com', '145236', 0 ,'Rua Amorim, 57', 'Rio de janeiro', '05879-025');
call inserir_Usuario('Kenha Tavares', 'Tavares@gmail.com', '238794', 0 ,'Rua Santa Ana, 89', 'São Paulo', '08754-063');
-- dados inseridos --
-- fim dos inserts -- 
