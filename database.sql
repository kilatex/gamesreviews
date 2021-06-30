CREATE DATABASE IF NOT EXISTS gamesreviews;

USE gamesreviews;
CREATE TABLE  IF NOT EXISTS users(
    id  int(255) auto_increment not null,
    role    varchar(20),
    name    varchar(100),
    surname varchar(200),
    nick    varchar(100),
    email varchar(255),
    password varchar(255),
    image   varchar(255),
    created_at  datetime,
    updated_at  datetime,
    remember_token varchar(255),
    CONSTRAINT pk_users PRIMARY KEY(id)

)ENGINE=InnoDb;

CREATE TABLE  IF NOT EXISTS images(
    id  int(255) auto_increment not null,
    user_id  int(255),
    image_path    varchar(255),
    description    text,
    created_at  datetime,
    updated_at  datetime,
    CONSTRAINT pk_images PRIMARY KEY(id),
    CONSTRAINT fk_images_users FOREIGN KEY(user_id) REFERENCES users(id)

)ENGINE=InnoDb;


CREATE TABLE  IF NOT EXISTS comments(
    id  int(255) auto_increment not null,
    user_id  int(255),
    image_id   int(255),
    content    text,
    created_at  datetime,
    updated_at  datetime,
    CONSTRAINT comments PRIMARY KEY(id),
    CONSTRAINT fk_comments_users FOREIGN KEY(user_id) REFERENCES users(id),
    CONSTRAINT fk_comments_images FOREIGN KEY(image_id) REFERENCES images(id)

)ENGINE=InnoDb;



CREATE TABLE  IF NOT EXISTS likes(
    id  int(255) auto_increment not null,
    user_id  int(255),
    image_id   int(255),
    created_at  datetime,
    updated_at  datetime,
    CONSTRAINT likes PRIMARY KEY(id),
    CONSTRAINT fk_likes_users FOREIGN KEY(user_id) REFERENCES users(id),
    CONSTRAINT fk_likes_images FOREIGN KEY(image_id) REFERENCES images(id)

)ENGINE=InnoDb;




/* CREAR USUARIOS */
INSERT INTO users VALUES(NULL,'user','Santiago','Maldonado','Kilatex','santiagodmaldon@gmail.com','santiago',null,CURTIME(),CURTIME(),null);
INSERT INTO users VALUES(NULL,'user','Juan','Messi','dios','messi@gmail.com','juan',null,CURTIME(),CURTIME(),null);
INSERT INTO users VALUES(NULL,'user','Pedro','Ronaldo','cr7','cr7@gmail.com','pedro',null,CURTIME(),CURTIME(),null);

/* INSERTAR IMAGENES (POSTS) */

INSERT INTO images VALUES(null,1,'text.jpg','descripcion de prueba',CURTIME(),CURTIME());
INSERT INTO images VALUES(null,1,'jota.jpg','JOTA TREMENDO LOCO',CURTIME(),CURTIME());
INSERT INTO images VALUES(null,1,'eleuve.jpg','ELADIO CARRIONNN',CURTIME(),CURTIME());
INSERT INTO images VALUES(null,2,'playa.jpg','descripcion de playitaaaa',CURTIME(),CURTIME());
INSERT INTO images VALUES(null,3,'arena.jpg','arena pura y dura',CURTIME(),CURTIME());

/* INSERTAR COMENTARIOS */
INSERT INTO comments VALUES(null,1,2,'aqui va un comentario demasiado crack',CURTIME(),CURTIME());
INSERT INTO comments VALUES(null,1,4,'ESTE COMENTARIO ES AUN MEJOR PERRITO',CURTIME(),CURTIME());
INSERT INTO comments VALUES(null,2,3,'Que loco que estás perrito',CURTIME(),CURTIME());


/* INSERTAR LIKES */
INSERT INTO likes VALUES(null,1,4,CURTIME(),CURTIME());
INSERT INTO likes VALUES(null,2,1,CURTIME(),CURTIME());
INSERT INTO likes VALUES(null,3,2,CURTIME(),CURTIME());
INSERT INTO likes VALUES(null,3,1,CURTIME(),CURTIME());
INSERT INTO likes VALUES(null,3,3,CURTIME(),CURTIME());
