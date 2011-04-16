create table politicians (
id int not null primary key auto_increment,
name varchar(400),
role varchar(400),
party varchar(400)
);

CREATE table  media (
  id int not null primary key auto_increment,
  newssource varchar(400),
  newsdate date,
  content varchar(400),
  location  varchar(400),
  politician_name varchar(400),
  politicians_id int ,
  FOREIGN KEY (politicians_id) references politicians(id),
  word  varchar(400),
  posorneg varchar(400)
);