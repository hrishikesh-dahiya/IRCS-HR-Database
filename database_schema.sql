
DROP TABLE IF EXISTS personal_information;

CREATE TABLE `personal_information` (
    `employee_code` VARCHAR(20) PRIMARY KEY,
    `title` VARCHAR(10) NOT NULL,
    `name` VARCHAR(30) NOT NULL,
    `sex` VARCHAR(10) NOT NULL,
    `dob` DATE NOT NULL,
    `staff_classification` VARCHAR(20),
    `designation` VARCHAR(20) NOT NULL,
    `reporting_manager` VARCHAR(30),
    `department` VARCHAR(20),
    `location` VARCHAR(20) NOT NULL,
    `date_of_joining` DATE NOT NULL,
    `date_of_retirement` DATE NOT NULL,
    `diversity_status` VARCHAR(20),
    `educational_qualificaiton` VARCHAR(30),
    `education_details` VARCHAR(30),
    `professional_qualification` VARCHAR(30),
    `present_address` VARCHAR(50) NOT NULL,
    `permanent_address` VARCHAR(50),
    `city` VARCHAR(20) NOT NULL,
    `state` VARCHAR(20) NOT NULL,
    `phone` VARCHAR(15) NOT NULL,
    `emergency_no` VARCHAR(15),
    `email` VARCHAR(20) NOT NULL,
    `marital_status` VARCHAR(20) NOT NULL,
    `father_husband_name` VARCHAR(20),
    `father_husband` VARCHAR(8),
    `nominee_name` VARCHAR(20),
    `relationship` VARCHAR(20),
    `bank_name` VARCHAR(30) NOT NULL,
    `ifsc_code` VARCHAR(20) NOT NULL,
    `acc_no` VARCHAR(30) NOT NULL,
    `aadhar_no` VARCHAR(15) NOT NULL,
    `pan_no` VARCHAR(15) NOT NULL,
    `passport_no` VARCHAR(20),
    `pf_no` VARCHAR(15),
    `uan_no` VARCHAR(15),
    `last_working_day` DATE,
    `status` VARCHAR(10) NOT NULL
) ENGINE = InnoDB;

-- CREATE TABLE `hr-database0.1`.`Personal_Information` ( `Employee_Code` VARCHAR(20) NOT NULL , `Title` VARCHAR(10) NOT NULL , `Name` VARCHAR(30) NOT NULL , `Sex` VARCHAR(10) NOT NULL , `DOB` DATE NOT NULL , `Age` INT(5) NOT NULL , `Staff_Classification` VARCHAR(20) NOT NULL , `Designation` VARCHAR(20) NOT NULL , `Reporting_Manager` VARCHAR(30) NOT NULL , `Department` VARCHAR(20) NOT NULL , `Location` VARCHAR(20) NOT NULL , `Date_of_Joining` DATE NOT NULL , `Diversity_Status` VARCHAR(20) NOT NULL , `Educational_Qualification` VARCHAR(30) NOT NULL , `Educational_Details` VARCHAR(30) NOT NULL , `Professional_Qualification` VARCHAR(30) NOT NULL , `Present_Address` VARCHAR(50) NOT NULL , `Permenant_Address` VARCHAR(50) NOT NULL , `City` VARCHAR(20) NOT NULL , `State` VARCHAR(20) NOT NULL , `Phone` VARCHAR(15) NOT NULL , `Emergency_No` VARCHAR(15) NOT NULL , `Email` VARCHAR(20) NOT NULL , `Marital_Status` VARCHAR(20) NOT NULL , `Father/Husband_Name` VARCHAR(20) NOT NULL , `Father/Husband` ENUM('Father','Husband') NOT NULL , `Nominee_Name` VARCHAR(20) NOT NULL , `Relationship` VARCHAR(20) NOT NULL , `Bank` VARCHAR(30) NOT NULL , `IFSC_Code` VARCHAR(20) NOT NULL , `Account_No` VARCHAR(30) NOT NULL , `Aadhar` VARCHAR(15) NOT NULL , `PAN` VARCHAR(15) NOT NULL , `Passport` VARCHAR(15) NOT NULL , `PF` VARCHAR(15) NOT NULL , `UAN` VARCHAR(15) NOT NULL , `Last_Working_Day` DATE NOT NULL , PRIMARY KEY (`Employee_Code`)) ENGINE = InnoDB; 

DROP TABLE IF EXISTS `contract`;

CREATE TABLE `contract` (
    `employee_code` VARCHAR(20) NOT NULL,
    `start_date` DATE NOT NULL,
    `end_date` DATE,
    `contract_renewal` DATE
) ENGINE = InnoDB;


-- CREATE TABLE `hr-database0.1`.`Contract` ( `Employee_Code` VARCHAR(20) NOT NULL , `Start_Date` DATE NOT NULL , `End_Date` DATE NOT NULL , `Due_for_Renewal` DATE NOT NULL ) ENGINE = InnoDB;

DROP TABLE IF EXISTS `experience`;

CREATE TABLE `experience` (
    `employee_code` VARCHAR(20) PRIMARY KEY,
    `with_ircs` VARCHAR(20) NOT NULL,
    `outside_ircs` VARCHAR(20) NOT NULL
) ENGINE = InnoDB;


-- CREATE TABLE `hr-database0.1`.`Experience` ( `Employee_Code` VARCHAR(20) NOT NULL , `With_IRCS` VARCHAR(20) NOT NULL , `Outside_IRCS` VARCHAR(20) NOT NULL , `Total` VARCHAR(20) NOT NULL ) ENGINE = InnoDB; 

DROP TABLE IF EXISTS `promotion`;

CREATE TABLE `promotion` (
    `employee_code` VARCHAR(20) NOT NULL,
    `type` ENUM('Internal','Lateral','External') NOT NULL,
    `date` DATE NOT NULL,
    `details_of_upgradation` VARCHAR(20)
) ENGINE = InnoDB;

-- CREATE TABLE `hr-database0.1`.`Promotion` ( `Employee_Code` VARCHAR(20) NOT NULL , `Type` ENUM('Internal','Lateral','External') NOT NULL , `Date` DATE NOT NULL , `Details_of_Upgradation` VARCHAR(20) NOT NULL ) ENGINE = InnoDB;

DROP TABLE IF EXISTS `officiating_position`;

CREATE TABLE `officiating_position` (
    `employee_code` VARCHAR(20) NOT NULL,
    `position` VARCHAR(20) NOT NULL,
    `start_date` DATE NOT NULL,
    `end_date` DATE
) ENGINE = InnoDB;


-- CREATE TABLE `hr-database0.1`.`Officiating_Position` ( `Employee_Code` VARCHAR(20) NOT NULL , `Position` VARCHAR(20) NOT NULL , `Start_Date` DATE NOT NULL , `End_Date` DATE NOT NULL ) ENGINE = InnoDB;


DROP TABLE IF EXISTS `salary_allowances`;

CREATE TABLE `salary_allowances` (
    `employee_code` VARCHAR(20) PRIMARY KEY,
    `band` VARCHAR(20),
    `level` VARCHAR(20),
    `band_pay` INT(10),
    `grade_pay` INT(10),
    `npa` INT(10),
    `sca` INT(10),
    `tda_arr` INT(10),
    `da` INT(10),
    `transport` INT(10),
    `tda` INT(10),
    `hra` INT(10),
    `cca` INT(10),
    `wash` INT(10),
    `hca` INT(10),
    `ewa` INT(10),
    `others` INT(10),
    `da_arr` INT(10),
    `ex_gratia` INT(10),
    `gross_salary` INT(10),
    `pf` INT(10),
    `future_gratuity` INT(10),
    `monthly_cto` INT(10),
    `monthly_cto_fg` INT(10),
    `annual_cto` INT(10),
    `annual_cto_fg` INT(10)    
) ENGINE = InnoDB;


-- CREATE TABLE `hr-database0.1`.`Salary_Allowances` ( `Band` VARCHAR(20) NOT NULL , `Level` VARCHAR(20) NOT NULL , `Band_Pay` INT(10) NOT NULL , `Grade_Pay` INT(10) NOT NULL , `NPA` INT(10) NOT NULL , `SCA` INT(10) NOT NULL , `TDA_Arr` INT(10) NOT NULL , `DA` INT(10) NOT NULL , `Transport` INT(10) NOT NULL , `TDA` INT(10) NOT NULL , `HRA` INT(10) NOT NULL , `CCA` INT(10) NOT NULL , `Wash` INT(10) NOT NULL , `HCA` INT(10) NOT NULL , `EWA` INT(10) NOT NULL , `CEA` INT(10) NOT NULL , `DA_Arrears` INT(10) NOT NULL , `Ex-gratia` INT(10) NOT NULL , `Gross_Salary` INT(10) NOT NULL , `PF` INT(10) NOT NULL , `Future_gratuity` INT(10) NOT NULL , `Monthly_CTO` INT(10) NOT NULL , `Monthly_CTO_FG` INT(10) NOT NULL , `Annual_CTO` INT(10) NOT NULL , `Annual_CTO_FG` INT(10) NOT NULL ) ENGINE = InnoDB; 


DROP TABLE IF EXISTS `credentials`;

CREATE TABLE `credentials` (
	`employee_code` VARCHAR(20) PRIMARY KEY,
	`password` VARCHAR(20)
) ENGINE = InnoDB;
