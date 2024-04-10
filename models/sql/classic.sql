/*Creating database school*/
create database classic
default character utf8
default collection general_ci_utf8;

/*28 tables createds on this database*/

/*Creating user model*/
create table users(
    id int not null primary key auto_increment,
    user_name varchar(30),
    full_name varchar(30),
    email varchar(50),
    password varchar(50)
);

/*officer and client area*/

/*Creating address model*/
create table address(
    id int not null primary key auto_increment,
    state varchar(30),
    city varchar(30),
    ba varchar(30),
    dwelling varchar(50)
);

/*Creating student model*/
create table student (
    id int not null primary key auto_increment,
    photo varchar(200),
    student_name varchar(40),
    tender varchar(40),
    father varchar(40),
    mother varchar(40),
    phone int(9),
    alternative_phone int(9),
    birth date,
    sex varchar(10),
    nbi varchar(40),
    date varchar(10),
    status varchar(20),
    alter_date timestamp,
    address_id int,
    classmate_id int,
    year_id int,
    foreign key(student_address_id) references address(id),
    foreign key(classmate_id) references classmate(id),
    foreign key(year_id) references year(id)
);

/*Crating did_belong_to_classmate model*/
create table did_belong_to_classmate(
    id int not null primary key auto_increment,
    photo varchar(100),
    student_name varchar(30),
    sex varchar(10),
    class_name varchar(5),
    period_name varchar(10),
    course_name varchar(30),
    sl_number int,
    student_id int,
    address_id int,
    classmate_id int,
    year_id int,
    foreign key(student_id) references student(id),
    foreign key(address_id) references address(id),
    foreign key(classmate_id) references classmate(id),
    foreign key(year_id) references year(id)
);

/*Creating student_has_group_of_notes model*/
create table student_has_group_of_notes(
    id int not null primary key auto_increment,
    student_id int,
    classmate_id int,
    year_id int,
    discipline_name varchar(20),
    group_name varchar(10),
    status varchar(10),
    alter_date timestamp,
    PP int,
    PP2 int,
    PT int,
    MT int,
    foreign key(student_id) references student(id),
    foreign key(classmate_id) references classmate(id),
    foreign key(year_id) references year(id)
);

/*Creating formation model*/
create table formation(
    id int not null primary key auto_increment,
    formation_name varchar(50),
    formation_level varchar(10),
    formation_date date,
    formation_local varchar(50)
);

/*Creating officer_has_formation model*/
create table officer_has_formation(
    id int not null primary key auto_increment,
    formation_id int,
    officer_id int,
    foreign key(formation_id) references formation(id),
    foreign key(officer_id) references officer(id)
);

/*Creating profission model*/
create table second_function(
    id int not null primary key auto_increment,
    second_function_name varchar(50)
);

/*Creating officer_has_second_profission model*/
create table officer_has_second_function(
    id int not null primary key auto_increment,
    second_function_id int,
    officer_id int,
    year_id int,
    foreign key(second_function_id) references second_function(id),
    foreign key(officer_id) references officer(id),
    foreign key(year_id) references year(id)
);

/*Creating officer model*/
create table officer(
    id int not null primary key auto_increment,
    photo varchar(200),
    officer_name varchar(40),
    phone int(9),
    alternative_phone int(9),
    birth date,
    sex varchar(10),
    nbi varchar(40),
    academic_level varchar(10),
    principal_function varchar(40),
    sallary int,
    status varchar(20),
    date varchar(10),
    alter_date timestamp,
    address_id int,
    account_info_id int,
    year_id int,
    foreign key(officer_address_id) references address(id),
    foreign key(account_info_id) references account_info(id),
    foreign key(year_id) references year(id)
);

/*Creating account_info*/
create table account_info(
    id int not null primary key auto_increment,
    name varchar(30),
    account_number int,
    iban varchar(50)
);

/*Administration area*/

/*Creating officer_pillow_day*/
create table officer_pillow_day(
    id int not null primary key auto_increment,
    day varchar(10),
    officer_id int,
    year_id int,
    foreign key(officer_id) references officer(id),
    foreign key(year_id) references year(id)
);

/*Creating officer_has_pillow_day*/
create table officer_has_pillow_daies(
    id int not null primary key auto_increment,
    officer_id int,
    year_id int,
    foreign key(officer_id) references officer(id),
    foreign key(year_id) references year(id)
);

/*Creating discipline model*/
create table discipline (
    id int not null primary key auto_increment,
    discipline_name varchar(30)
);

/*Creating teach_time model*/
create table teach_in_time (
    id int not null primary key auto_increment,
    start_time time,
    end_time time,
    teach_classmate_discipline_id int,
    foreign key(teach_classmate_discipline_id) references teach_classmate_discipline(id)
);

/*Creating teach_day model*/
create table teach_in_day (
    id int not null primary key auto_increment,
    day varchar(10),
    teach_classmate_discipline_id int,
    foreign key(teach_classmate_discipline_id) references teach_classmate_discipline(id)
);

/*Creating teach_classmate model*/
create table teach_classmate_discipline (
    id int not null primary key auto_increment,
    classmate_id int,
    teacher_id int,
    discipline varchar(40),
    year_id int,
    foreign key(classmate_id) references classmate(id),
    foreign key(teacher_id) references officer(id),
    foreign key(year_id) references year(id)
);

/*Creating course model*/
create table course(
    id int not null primary key auto_increment,
    course_name varchar(40)
);

/*Creating class model*/
create table class(
    id int not null primary key auto_increment,
    class_name varchar(5),
    month_price int
);

/*creating period model*/
create table period(
    id int not null primary key auto_increment,
    period_name varchar(10)
);

/*Creating sl model*/
create table sl(
    id int not null primary key auto_increment,
    sl_number int,
    users_number int
);

/*Creating classmate model*/
create table classmate(
    id int not null primary key auto_increment,
    classmate_name varchar(20),
    class_id int,
    period_id int,
    course_id int,
    sl_id int,
    foreign key(class_id) references class(id),
    foreign key(period_id) references period(id),
    foreign key(course_id) references course(id),
    foreign key(sl_id) references sl(id)
);

/*Creating functions model*/
create table functions(
    id int not null primary key auto_increment,
    name varchar(50)
);
/*pay area*/

/*creating officer_is_paied model*/
create table officer_is_paied(
    id int not null primary key auto_increment,
    value int,
    officer_id int,
    year_id int,
    date timestamp,
    foreign key(officer_id) references officer(id),
    foreign key(year_id) references year(id)
);

/*Creating paied_month model*/
create table paied_sallary(
    id int not null primary key auto_increment,
    sallary int,
    month_name varchar(15),
    pay_id int,
    officer_id int,
    year_id int,
    date timestamp,
    foreign key(pay_id) references officer_is_paied(id),
    foreign key(officer_id) references officer(id),
    foreign key(year_id) references year(id)
);

/*creating pay model*/
create table student_pay(
    id int not null primary key auto_increment,
    value int,
    student_id int,
    year_id int,
    date timestamp,
    foreign key(student_id) references student(id),
    foreign key(year_id) references year(id)
);

/*Creating student_has_paied_month model*/
create table student_has_paied_month(
    id int not null primary key auto_increment,
    value int,
    month_price int,
    month_name varchar(15),
    pay_id int,
    student_id int,
    year_id int,
    date timestamp,
    foreign key(pay_id) references pay(id),
    foreign key(student_id) references student(id),
    foreign key(year_id) references year(id)
);

/*Creating year model*/
create table year(
    id int not null primary key auto_increment,
    start int,
    end int,
    date timestamp
);

/*Creating school model*/
create table school(
    id int not null primary key auto_increment,
    name varchar(50),
    propietary varchar(30),
    email varchar(50),
    phone int(9),
    alternative_phone int,
    nif varchar(50),
    date varchar(10),
    alter_date timestamp,
    account_info_id int,
    foreign key(account_info_id) references account_info(id)
);
