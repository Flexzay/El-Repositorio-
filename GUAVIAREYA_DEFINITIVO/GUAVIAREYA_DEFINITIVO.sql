use db_guaviareya;
show tables;
show databases;

#CREACION DE TABLAS
create table tb_Usuarios(
	Correo  	varchar(50) not null,
    Nombre 		varchar(50) not null,
    Apellido 	varchar(50) not null,
    Contraseña  varchar(50)  not null,
    Telefono 	int not null,
				primary key(Correo)
);

Select*from tb_Usuarios;
ALTER TABLE tb_Usuarios
ADD COLUMN Contraseña varchar(50) 
AFTER Apellido;

---------------------------------------------------
CREATE TABLE tb_Restaurantes(
	ID_Restaurante  varchar(50) not null,
    Nombre 			varchar(50) not null,
    ID_Producto     varchar(50) not null,
    Direccion 		varchar(50) not null,
    Telefono 		varchar(50) not null,
					primary key(ID_Restaurante)
);
---------------------------------------------------
CREATE TABLE tb_PRODUCTOS(

	ID_Producto    varchar(50) not null,
	ID_Restaurante  varchar(50) not null,
    Nombre 			varchar(50) not null,
					primary key(ID_Producto)
);

---------------------------------------------------
CREATE TABLE tb_Pedido(
	ID_User 		varchar(50) not null,
	ID_Pedido  		varchar(50) not null,
	ID_Producto     varchar(50) not null,
    Valor_Pedido 	varchar(50) not null,
					primary key(ID_Pedido)
);



select * from tb_restaurantes;
select * from tb_productos;
select * from tb_Pedido;
select * from tb_Usuarios;
DROP TABLE tb_Restaurantes;

alter table tb_productos 
drop column correo;

ALTER TABLE tb_productos
ADD COLUMN Precio decimal 
AFTER Nombre;

#INSERT_DATOS
  INSERT INTO tb_productos VALUES (01,02,'Pizza',10000);
  INSERT INTO tb_productos VALUES (02,02,'Pizza con carne',12000);
  INSERT INTO tb_productos VALUES (03,01,'Hamburguesa',12000);
  INSERT INTO tb_productos VALUES (04,01,'Hamburguesa doble queso',15000);
#JOIN
  SELECT *
  FROM tb_productos t1, tb_restaurantes t2
  WHERE t1.ID_Producto =t2.id_Producto;