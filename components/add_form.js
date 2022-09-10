// modules
let b = "<form action='../controller/var_act' target='dummyframe' method='POST' class='add-form' display='block'><legend>New var_name</legend></br><group><lable>Name</lable><input name='var_inp' id='var_inp' required></input><input type='hidden' id=idvalue name='idvalue' value=''></input></group>";
let sub = "<div style='display:flex;flex-direction:row;'><button type='submit' id='add-submit' >Submit</button></div></form>";
let helper = "<group>     <lable>*Preffered Name</lable>      <input name='newhelper_p' id='newhelper_p'></input></group>     <group>  <lable>*Email</lable>  <input name='email' id='email'></input>  </group>      <group>  <lable>*Notification?</lable>  <select name='notify' id='notify'>  <option value ='1' selected='selected'>Yes notify me</option>  <option value ='0'>No, don't notify me</option>  </select></group>";
// config

var add_form_group = b.replace('var_act','groupAdd.php').replace('var_inp','newgroup').replace('var_name', 'Group') + sub;

var add_form_role = b.replace('var_act','roleAdd.php').replace('var_inp','newrole').replace('var_name', 'Role') + sub;

var add_form_helper = b.replace('var_act','helperAdd.php').replace('var_inp','newhelper').replace('var_name', 'Helper') + helper + sub;




