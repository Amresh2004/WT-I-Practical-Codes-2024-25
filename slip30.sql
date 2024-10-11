CREATE TABLE Student (
    stud_id SERIAL PRIMARY KEY,  
    name VARCHAR(100) NOT NULL,  
    class VARCHAR(50)            
);

INSERT INTO Student (name, class) 
VALUES 
('Amresh', '10th'),
('Shubham', '12th'),
('Mitesh', '11th');


SELECT * from Student;

CREATE TABLE Competition (
    c_no SERIAL PRIMARY KEY,      
    c_name VARCHAR(100) NOT NULL  
);

INSERT INTO Competition (c_name) 
VALUES 
('Math Olympiad'),
('Science Fair'),
('Debate Competition');

select * from Competition;

CREATE TABLE Student_Competition (
    stud_id INT REFERENCES Student(stud_id),  
    c_no INT REFERENCES Competition(c_no),    
    rank INT,                                                   
    year INT,                                                   
    PRIMARY KEY (stud_id, c_no)                                 
);

INSERT INTO Student_Competition (stud_id, c_no, rank, year)
VALUES 
(1, 1, 1, 2023),  
(2, 2, 2, 2023),  
(3, 1, 2, 2023);  

select * from Student_Competition;