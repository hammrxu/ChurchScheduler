// modules
let b = "<form action='../controller/var_act' target='dummyframe' method='POST' class='add-form' display='block'><group><lable>Name</lable><input name='var_inp' id='var_inp' required></input><input type='hidden' id=idvalue name='idvalue' value=''></input></group>";
let sub = "<div style='display:flex;flex-direction:row;'><button type='submit' id='add-submit' >Submit</button></div></form>";
let helper = "<group>     <lable>*Preffered Name</lable>      <input name='newhelper_p' id='newhelper_p'></input></group>     <group>  <lable>*Email</lable>  <input name='email' id='email'></input>  </group>      <group>  <lable>*Notification?</lable>  <select name='notify' id='notify'>  <option value ='1' selected='selected'>Yes notify me</option>  <option value ='0'>No, don't notify me</option>  </select></group>";

// config

var add_form_group = b.replace('var_act','groupAdd.php').replace('var_inp','newgroup') + sub;
// "<form action='../controller/groupAdd.php' target='dummyframe' method='POST' class='add-form'><input name='newgroup'></input><button type='submit' id='add-submit' >submit</button></form>"

var add_form_role = b.replace('var_act','roleAdd.php').replace('var_inp','newrole')+ sub;
/* <form action='../controller/roleAdd.php' target='dummyframe' method='POST' class='add-form'><input name='newrole'></input><button type='submit' id='add-submit' >submit</button></form> */

var add_form_helper = b.replace('var_act','helperAdd.php').replace('var_inp','newhelper')+ helper + sub;
// "<form action='../controller/helperAdd.php' target='dummyframe' method='POST' class='add-form'><lable>name</lable><input name='newhelper'></input><button type='submit' id='add-submit' >submit</button></form>"






