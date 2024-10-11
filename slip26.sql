CREATE TABLE hosp (
    hno SERIAL PRIMARY KEY,     
    hname VARCHAR(100) NOT NULL, 
    haddress TEXT,               
    hcity VARCHAR(50),           
    harea VARCHAR(50)            
);

INSERT INTO hosp (hname, haddress, hcity, harea)
VALUES 
('City Hospital', '123 Main St', 'New York', 'Downtown'),
('General Hospital', '456 Elm St', 'Chicago', 'Suburbs'),
('Metro Hospital', '789 Oak St', 'Los Angeles', 'Central');

SELECT * FROM hosp;

CREATE TABLE doct (
    dno SERIAL PRIMARY KEY,       
    dname VARCHAR(100) NOT NULL,  
    dadd TEXT,                    
    dcity VARCHAR(50),           
    darea VARCHAR(50),            
    hno1 INT REFERENCES hosp(hno)
);

INSERT INTO doct (dname, dadd, dcity, darea, hno1)
VALUES
('Dr. John Smith', '101 Maple St', 'New York', 'Uptown', 1),
('Dr. Emily White', '202 Pine St', 'Chicago', 'Northside', 2),
('Dr. Robert Brown', '303 Cedar St', 'Los Angeles', 'Westside', 3),
('Dr. Sarah Jones', '404 Spruce St', 'New York', 'Eastside', 1);

SELECT * FROM doct;