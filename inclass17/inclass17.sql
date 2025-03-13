CREATE TABLE `students`
(
    `id`        int(11) NOT NULL AUTO_INCREMENT,
    `firstName`      varchar(80) NOT NULL,
    `lastName`      varchar(80) NOT NULL,
    primary key (`id`)
);

insert into students (firstName, lastName)
values ('Bethany', 'Shaw');
insert into students (firstName, lastName)
values ('Sheri', 'Fitzgerald');
