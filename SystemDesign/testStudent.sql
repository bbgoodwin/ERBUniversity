-- Create Student
INSERT INTO student(stuId, deptCode, facId, status, program, numberOfCredits) VALUES ('1','','300000153','1','0','16');
INSERT INTO login(userId, email, password, usertype) VALUES ('1', 'bgoodwi4@oldwestbury.edu',
  '$2y$10$lBZzJnd9AvfNOEUCWz1hvO65GYgOZgLNLucpSIjWJdQVyF.tqlz3q', '4');
INSERT INTO undergraduate(stuId) VALUES ('1');
INSERT INTO `user`(`userId`, `fname`, `mname`, `lname`, `gender`, `dob`, `country`, `state`, `city`,
  `street`, `zipcode`, `phonenumber`) VALUES ('1', 'Ben', 'E', 'Goodwin', 'Male', '1997-03-05', 'USA',
    'California', 'San Jose', 'Santana Row', '20852', '7187364241');

-- Create history
INSERT INTO history(stuId, crn, section, semester, grade) VALUES ('1', 'MA7815', '1', 'Spring 2018', 'B-');
INSERT INTO history(stuId, crn, section, semester, grade) VALUES ('1', 'MA7125', '1', 'Spring 2018', 'B');
INSERT INTO history(stuId, crn, section, semester, grade) VALUES ('1', 'EL8107', '1', 'Spring 2018', 'A');
INSERT INTO history(stuId, crn, section, semester, grade) VALUES ('1', 'MA8463', '1', 'Spring 2018', 'B+');

-- Create enrollment
INSERT INTO `enrollment`(`stuId`, `crn`, `section`, `semester`) VALUES ('1','MA6633','3','Fall 2018');
INSERT INTO `enrollment`(`stuId`, `crn`, `section`, `semester`) VALUES ('1','VA3660','1','Fall 2018');
INSERT INTO `enrollment`(`stuId`, `crn`, `section`, `semester`) VALUES ('1','EL4776','1','Fall 2018');

--
-- Dumping data for table `majorCurriculum`
--

-- BIO BA
INSERT INTO `majorcurriculum` (`majorcode`, `courseName`) VALUES
('10001', 'Basic Biology I'),
('10001', 'Basic Biology II'),
('10001', 'Seminar I in Biology: Reading in the Discipline'),
('10001', 'Seminar II in Biology: Writing in the Discipline'),
('10001', 'Cell Biology'),
('10002', 'Vertebrate Physiology'),
('10002', 'Ecology'),
('10002', 'Genetics'),
('10002', 'Biochemistry'),
('10002', 'Cancer Cell Biology');

-- BIO BS
INSERT INTO `majorcurriculum` (`majorcode`, `courseName`) VALUES
('10002', 'Basic Biology I'),
('10002', 'Basic Biology II'),
('10002', 'Principles of Chemistry I'),
('10002', 'Principles of Chemistry II'),
('10002', 'Structure of Physics I'),
('10002', 'Structure of Physics II'),
('10002', 'Cell Biology'),
('10002', 'Vertebrate Physiology'),
('10002', 'Ecology'),
('10002', 'Genetics'),
('10002', 'Biochemistry'),
('10002', 'Cancer Cell Biology');

-- CHEM BA
INSERT INTO `majorcurriculum` (`majorcode`, `courseName`) VALUES
('20001', 'Principles of Chemistry I'),
('20001', 'Principles of Chemistry II'),
('20001', 'Organic Chemistry I'),
('20001', 'Organic Chemistry II'),
('20001', 'Analytical Chemistry'),
('20001', 'Physical Chemistry I'),
('20001', 'Physical Chemistry II'),
('20001', 'Senior Seminar I'),
('20001', 'Senior Seminar II'),
('20001', 'General Physics I'),
('20001', 'Biochemistry I'),
('20001', 'Calculus I'),
('20001', 'Calculus II');

-- CHEM BS
INSERT INTO `majorcurriculum` (`majorcode`, `courseName`) VALUES
('20002', 'Principles of Chemistry I'),
('20002', 'Principles of Chemistry II'),
('20002', 'Organic Chemistry I'),
('20002', 'Organic Chemistry II'),
('20002', 'Analytical Chemistry'),
('20002', 'Physical Chemistry I'),
('20002', 'Physical Chemistry II'),
('20002', 'Advanced Chemical Methods'),
('20002', 'Senior Seminar I'),
('20002', 'Senior Seminar II'),
('20002', 'General Physics I'),
('20002', 'General Physics II'),
('20002', 'Calculus I'),
('20002', 'Calculus II'),
('20002', 'Calculus III'),
('20002', 'Biochemistry I'),
('20002', 'Biochemistry II'),
('20002', 'Biochemistry for Life Science');

-- BIO CHEM
INSERT INTO `majorcurriculum` (`majorcode`, `courseName`) VALUES
('20003', 'Principles of Chemistry I'),
('20003', 'Principles of Chemistry II'),
('20003', 'Organic Chemistry I'),
('20003', 'Organic Chemistry II'),
('20003', 'Analytical Chemistry'),
('20003', 'Physical Chemistry I'),
('20003', 'Senior Seminar I'),
('20003', 'Senior Seminar II'),
('20003', 'Biochemistry I'),
('20003', 'Biochemistry II'),
('20003', 'Basic Biology I'),
('20003', 'Basic Biology II'),
('20003', 'Cell Biology'),
('20003', 'Genetics'),
('20003', 'Molecular Biology'),
('20003', 'Structure of Physics I'),
('20003', 'Calculus I'),
('20003', 'Calculus II'),
('20003', 'Microbiology'),
('20003', 'Cancer Cell Biology');

-- ENG
INSERT INTO `majorcurriculum` (`majorcode`, `courseName`) VALUES
('30001', 'Structure and Grammar of English'),
('30001', 'Literature Across Cultures I: Analysis'),
('30001', 'Literature Across Cultures II: Theory'),
('30001', 'Critical Theory'),
('30001', 'U.S. Literature I\'Colonial Period to Civil War'),
('30001', 'Literatures of Europe Part I'),
('30001', 'Greek Drama'),
('30001', 'Harlem Renaissance'),
('30001', 'Native American Literature'),
('30001', 'Major Authors');

-- HIS
INSERT INTO `majorcurriculum` (`majorcode`, `courseName`) VALUES
('40001', 'Introduction to European History'),
('40001', 'American People I'),
('40001', 'African History'),
('40001', 'Global Geography'),
('40001', 'Twentieth Century'),
('40001', 'Crescent and Cross'),
('40001', 'Making History'),
('40001', 'Early America'),
('40001', 'Vietnam and After'),
('40001', 'From God to Machine');

-- CIS
INSERT INTO `majorcurriculum` (`majorcode`, `courseName`) VALUES
('50001', 'Software Engineering'),
('50001', 'Database Management Systems'),
('50001', 'Computer Architecture I'),
('50001', 'Internet and Web Technologies'),
('50001', 'Computer Programming I'),
('50001', 'Computer Programming II'),
('50001', 'C++ and Object-Oriented Programming'),
('50001', 'Technical Communications'),
('50001', 'Computer Networks'),
('50001', 'Data Mining'),
('50001', 'Computer Network Security'),
('50001', 'Calculus and Analytic Geometry I'),
('50001', 'Discrete Mathematics'),
('50001', 'Introduction to Probability & Statistics'),
('50001', 'Linear Algebra');

-- MIS
INSERT INTO `majorcurriculum` (`majorcode`, `courseName`) VALUES
('50002', 'Computer Programming I'),
('50002', 'Computer Programming II'),
('50002', 'Advanced Visual Basic and Database Application Programming'),
('50002', 'Technical Communications'),
('50002', 'Software Engineering'),
('50002', 'Database Management Systems'),
('50002', 'MIS Topics'),
('50002', 'Internet and Web Technologies'),
('50002', 'System Design & Implementation'),
('50002', 'Principles of Microeconomics'),
('50002', 'Principles of Macroeconomics'),
('50002', 'Principles of Accounting I'),
('50002', 'Principles of Accounting II'),
('50002', 'Marketing: Principles and Concepts'),
('50002', 'Organizational Behavior & Management'),
('50002', 'Discrete Mathematics'),
('50002', 'Intro. To Probability and Statistics');

-- MATH
INSERT INTO `majorcurriculum` (`majorcode`, `courseName`) VALUES
('60001', 'Calculus and Analytic Geometry I'),
('60001', 'Calculus and Analytic Geometry II'),
('60001', 'Discrete Mathematics'),
('60001', 'Linear Algebra'),
('60001', 'Intro. To Probability and Statistics'),
('60001', 'Calculus and Analytic Geometry III'),
('60001', 'Transition to Advanced Mathematics'),
('60001', 'Differential Equations'),
('60001', 'Abtract Algebra I'),
('60001', 'Advanced Calculus I'),
('60001', 'Computer Programming I'),
('60001', 'Probability'),
('60001', 'Number Theory'),
('60001', 'Geometry');

-- PSY BA
INSERT INTO `majorcurriculum` (`majorcode`, `courseName`) VALUES
('70001', 'Introduction to Psychology'),
('70001', 'Research Design & Analysis I'),
('70001', 'Research Design and Analysis II'),
('70001', 'Senior Seminar I'),
('70001', 'Cognitive Psychology'),
('70001', 'Learning & Motivation'),
('70001', 'Psychology of Decision-Making and Judgement'),
('70001', 'Cognitive Neuroscience'),
('70001', 'Psychology of Teaching & Learning'),
('70001', 'Brain & Behavior'),
('70001', 'Drugs & Behavior'),
('70001', 'The Psychobiology of Aging'),
('70001', 'Developmental Neuropathology'),
('70001', 'Neuropsychopharmacology'),
('70001', 'Clinical Neuropsychology');

-- PSY BS
INSERT INTO `majorcurriculum` (`majorcode`, `courseName`) VALUES
('70002', 'Introduction to Psychology'),
('70002', 'Research Methods I'),
('70002', 'Research Methods II'),
('70002', 'Research Methods III'),
('70002', 'Field Experience and Research'),
('70002', 'Cognitive Psychology'),
('70002', 'Learning & Motivation'),
('70002', 'Psychology of Decision-Making and Judgement'),
('70002', 'Cognitive Neuroscience'),
('70002', 'Psychology of Teaching & Learning'),
('70002', 'Brain & Behavior'),
('70002', 'Drugs & Behavior'),
('70002', 'The Psychobiology of Aging'),
('70002', 'Developmental Neuropathology'),
('70002', 'Neuropsychopharmacology'),
('70002', 'Clinical Neuropsychology');

-- VA
INSERT INTO `majorcurriculum` (`majorcode`, `courseName`) VALUES
('80001', 'Introduction to Creative Thinking'),
('80001', 'Basic Design'),
('80001', 'Drawing'),
('80001', 'Introduction to Color'),
('80001', 'Art History I: 19th Century Art'),
('80001', 'Visual Culture - Warhol to Present'),
('80001', 'Art Tutorials I'),
('80001', 'Digital Imaging'),
('80001', 'Art Tutorials II'),
('80001', 'Art Tutorials III');

--
-- Dumping data for table `minorCurriculum`
--

-- CIS
INSERT INTO `minorcurriculum`(`minorcode`, `courseName`) VALUES
(10001,'Computer Programming I'),
(10001,'Computer Programming II'),
(10001,'Data Structures & Algorithms'),
(10001,'Software Engineering'),
(10001,'Data Mining');

-- MATH
INSERT INTO `minorcurriculum`(`minorcode`, `courseName`) VALUES
(20001,'Calculus & Analytic Geometry I'),
(20001,'Calculus & Analytic Geometry II'),
(20001,'Discrete Mathematics'),
(20001,'Linear Algebra'),
(20001,'Number Theory'),
(20001,'Calculus and Analytic Geometry III');

-- HIS
INSERT INTO `minorcurriculum`(`minorcode`, `courseName`) VALUES
(30001,'Introduction to African-American Studies'),
(30001,'African American History I'),
(30001,'Social Movements'),
(30001,'Literatures of Africa');

-- VA
INSERT INTO `minorcurriculum`(`minorcode`, `courseName`) VALUES
(40003,'Basic Design'),
(40003,'Drawing'),
(40003,'Introduction to Color'),
(40003,'Graphic Design I'),
(40003,'Digital Animation');

-- PY
INSERT INTO `minorcurriculum`(`minorcode`, `courseName`) VALUES
(50001,'Introduction to Psychology'),
(50001,'Foundations of Child Development'),
(50001,'Social Psychology'),
(50001,'Cognitive Psychology'),
(50001,'Psychology of Gender');
