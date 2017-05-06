For this Assignment, i am using database(intern) whose configuration file is connect.php. And creating 4 tables. Signup table for students(studentlogin), Signup table for employers(elogin), and application table(that contains the information about the internship posted by the employers), and the last table is dashboard(where students can see their applied internship).
/****
*****
Tables with its attributes
****
->Table studentlogin(id(primary_key),lname,fname,email,password).
->Table elogin(id(primary_key),lname,fname,email,password,oname(organization name)).
->Table application(id,user,title,description,stipend,oname,start(posted on date),apply(last date for application)).
->Table dashboard(id,title,oname,status,user,why,applied_on).

*****
****/
->First page is the login page.
->ssignin.php is the signin page for the students.
->ssignup.php is the signup page for the students.
->emsignin.php is the signin page for the employers.
->emsignup.php is the signup page for the employers.
->In this assignment i focused on all the condition that was mentioned in application , for students as well as for employers.
->Process.php is responsible for the internship application by students and it also validates and checks if the users is requesting for the same internship again and again or not.
->Submit.php contains the information about the requested internship by students.
->checkstatus.php is the page where students can see the applied internship by him.

/****

-->Expired internship is checked at the index.php and show.php
 which has the logic that if the (apply_by date is < current date) than donot display the internship.

