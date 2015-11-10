create table item (
    id int auto_increment primary key,
    name varchar(255),
    description varchar(255),
    price decimal(7,2)
);

create table customer (
    id int auto_increment primary key,
    first_name varchar(50),
    last_name varchar(50),
    email varchar(255),
    phone varchar(50),
    gender varchar(15),
    customer_since timestamp default current_timestamp
);

create table invoice (
    id int auto_increment primary key,
    customer_id int not null,
    created_at timestamp
);

create table invoice_item (
    invoice_id int not null,
    item_id int not null,
    quantity int not null,
    primary key (invoice_id, item_id)
);

-- ------------ Test Data ---------------------
insert into item (name, description, price) values
    ('hammer', 'big ball peen', 20.99),
    ('hammer', 'med ball peen', 18.99),
    ('hammer', 'small ball peen', 16.99),
    ('hand saw', 'crosscut', 25.99),
    ('miter saw', '', 22.05),
    ('drill', '3/8"', 45.99),
    ('nails', '10p 50 count', 5.99);

insert into customer (first_name, last_name, email, phone, customer_since)
    values
    ('bob', 'lablah', 'bob@lablah.law', '123-456-7890', '2002-10-10'),
    ('nancy', 'smith', 'nsmith@hotmail.com', '111-222-3333', '2005-01-21'),
    ('bob', 'dylan', 'bob@rollinstone.com', '999-999-9999', '1963-05-05'),
    ('dennis', 'ritchie', 'dennis@c.com', '000-000-0000', '1972-02-05'),
    ('larry', 'wall', 'god@perl.com', '777-777-7777', '1988-03-23');
    ('karen', 'jones', 'kjones@gmail.com', '504-555-1212', '1981-04-04');

insert into invoice (customer_id, created_at)
    values
    (1, now()), (1, now()),
    (2, now()), (2, now()),
    (3, now());

insert into invoice_item (invoice_id, item_id, quantity)
    values
    (1, 1, 1),
    (1, 2, 11),
    (2, 2, 2),
    (2, 1, 22),
    (3, 5, 13);

