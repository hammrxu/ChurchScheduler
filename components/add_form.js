// modules
let b = "<form action='../controller/var_act' target='dummyframe' method='POST' class='add-form'><input name='var_inp'></input>";
let sub = "<button type='submit' id='add-submit' >submit</button></form>";
let helper = "<lable>email</lable><input name='email'></input>";

// config

var add_form_group = b.replace('var_act','groupAdd.php').replace('var_inp','newgroup') + sub;
// "<form action='../controller/groupAdd.php' target='dummyframe' method='POST' class='add-form'><input name='newgroup'></input><button type='submit' id='add-submit' >submit</button></form>"

var add_form_role = b.replace('var_act','roleAdd.php').replace('var_inp','newRole')+ sub;
/* <form action='../controller/roleAdd.php' target='dummyframe' method='POST' class='add-form'><input name='newRole'></input><button type='submit' id='add-submit' >submit</button></form> */

var add_form_helper = b.replace('var_act','helperAdd.php').replace('var_inp','newhelper')+ helper + sub;
// "<form action='../controller/helperAdd.php' target='dummyframe' method='POST' class='add-form'><lable>name</lable><input name='newhelper'></input><button type='submit' id='add-submit' >submit</button></form>"

