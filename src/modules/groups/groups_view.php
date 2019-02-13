                                                                                                                                                                                                                                                                                  <?php
/**
 * Created by PhpStorm.
 * User: connor
 * Date: 10/25/18
 * Time: 2:07 AM
 */
    require('groups_controller.php');
    include('../../views/header.php');
?>
<div class="container">
    <h3 id="GroupHead">My Groups</h3>
    <hr>

    <?php
    if($_SESSION['role'] == "USER"){
        $groups = getCurrentGroup($_SESSION['uid']);
        try{
            if(sizeof($groups) > 0){
                foreach($groups as $groupName){
                    echo "<div class=\"my-group-container\">";
                    echo "<h5>" . $groupName['name'] . "</h5>";
                    if($_SESSION['role'] == "USER"){
                        $groupMembers = getMyGroupMembers($groupName['UID']);
                        if(sizeof($groupMembers) > 0){
                            try{
                                foreach($groupMembers as $group) {
                                    echo "<span class=\"badge badge-success\">" . $group['first_name'] . " " . $group['last_name'] . " </span><br>";
                                }

                            }catch(Exception $e){
                                return $e;
                            }
                        }
                        echo "</div>";
                    }
                }
            }
            else{
                echo "<div style = \"margin-top: 10rem\" class=\"text-center\">
                        <h2>You are not currently in a group</h2>
                    </div>";
            }
        }catch(Exception $e){
            return $e;
        }
        echo "</div>";
    }

    else if($_SESSION['role'] == "RESTRICTED") {
        $groups = getCurrentGroup($_SESSION['UID']);
        try {
            if (sizeof($groups) > 0) {
                foreach ($groups as $groupName) {
                    echo "<div class=\"my-group-container\">";
                    echo "<h5>" . $groupName['name'] . "</h5>";
                    echo "</div>";
                }
            }
        } catch (Exception $e) {
            return $e;
        }
    }
    else if($_SESSION['role'] == "SUPERUSER" || $_SESSION['role'] == "ADMIN" || $_SESSION['role'] == "SUPERADMIN"){
        echo "
            <h3 id=\"groupsHead\" style=\"display:inline\">Groups</h3>
          <button style=\"display:inline;margin-left:20px;\" id=\"addgroupBut\" type=\"button\" name=\"addGroup\" class=\"btn btn-sm btn-success\" data-toggle=\"modal\" data-target=\"#addGroupModal\">Add Group</button>
          <button style = \"display:inline-block;margin-left:20px;\" type = \"button\" name = \"addUserGroup\" class=\"btn btn-sm btn-success\" data-toggle = \"modal\" data-target = \"#addUserGroupModal\" >Add User</button >
          <hr>
          <div style=\"margin-left:5%;\">
          </div>
        ";
        $allGroups = getAllGroups();
        //renders groups
        if(sizeof($allGroups) > 0){
            foreach($allGroups as $group){
                echo "<div class=\"my-group-container\">
                    <div>
                       <h5 style = \"display: inline-block;\" id=\"Group".$group['name']."Namehead\"><u>".$group['name']."</u></h5>";
                echo "<form class = \"float-right\" name=\"removeGroup\" id=\"RemoveGroup".$count."\" method=\"post\">";
                echo "<input type=\"text\" id=\"Group".$group['name']."\" name=\"groupR\" value=\"".$group['UID']."\" style=\"display:none;\">";
                echo "<button style=\"display:inline-block;margin-left:10px;\" id=\"removeGroup".$count."\" type=\"submit\" name=\"removeGroup\" class=\"btn btn-sm btn-danger\" data-group=\"".$group['UID']."\">Remove Group</button>";
                echo "</form></div><br>";
                $innerGroups = getInnerGroups($group['UID']);
                $countInner = 0;
                //renders inner groups by groupID
                if(sizeof($innerGroups) > 0){
                echo "<ul class = \"list-group list-group-flush\">";
                    foreach ($innerGroups as $innerGroup) {
                        $leadership = "";
                        if ($innerGroup['leader'] == 1) {
                            $leadership = "(Leader) ";
                        }
                            echo "
                                    <!--<span style =\"vertical-align: center\" class=\"badge badge-success\">" . $leadership . $innerGroup['first_name'] . " ". $innerGroup['last_name'] . "</span>
                                    <span style= \"vertical-align: center; margin: 0rem 2rem 0rem 2rem\" class=\"badge badge-success\">" . $innerGroup['Email'] . "</span>-->
                                    <li  class=\"list-group-item\">" . $leadership . $innerGroup['first_name'] . " ". $innerGroup['last_name'] . " " . $innerGroup['Email'] . "
                                    <div class=\"group-btn\">
                                        <form action=\"\" id=\"Group".$innerGroup['name'].">UserActions\" method=\"post\">
                                        <input
                                        type=\"text\"
                                        name=\"user_p_id\"
                                        value=\"".$innerGroup['UID']."\"
                                        style=\"display:none;\">
                                       <input
                                        type=\"text\"
                                        name=\"group_p_id\"
                                        value=\"".$group['UID']."\"
                                        style=\"display:none;\">";

                                    if($innerGroup['leader'] == 1)
                                    {
                                        echo "
                                        <input type=\"text\"  name=\"is_leader\" value=\"".$innerGroup['leader']."\" style=\"display:none;\">
                                        <button type=\"submit\" id=\"Demote\" class=\"btn btn-sm btn-info\"'>Demote&nbsp;</button>
                                        ";
                                    }
                                    else{
                                        echo "
                                        <input type=\"text\"name=\"is_leader\" value=\"".$innerGroup['leader']."\" style=\"display:none;\">
                                        <button type=\"submit\" id=\"Promote\" class=\"btn btn-sm btn-info\"'>Promote&nbsp;</button>
                                        ";
                                    }
                                    echo"</form>
                                    </div>";

                                    echo"
                                    <div class=\"group-btn\">
                                        <form action=\"\" id=\"userFormRemove".$countInner."\" method=\"post\">
                                            <input type=\"text\" id=\"userRemoveInput".$countInner."\" name=\"user_remove\" value =\"".$innerGroup['UID']."\" style=\"display:none;\">
                                            <input type=\"text\" id=\"groupRemoveInput".$countInner."\" name=\"group_remove\" value =\"".$group['UID']."\" style=\"display:none;\">
                                            <button type=\"submit\" id=\"remove".$countInner."\" name=\"button\" class=\"btn btn-sm btn-danger\">Remove</button>
                                        </form>
                                    </div>
                                </li>";
                        }
                            $countInner++;
                        echo "</ul>";
                    }
                    else{
                        echo "<h5>No Current Users</h5>";
                     }
                    $count++;
                    echo "</div>";
                }
            }
            else{
                echo "<h5>No Current Groups</h5></div>";
            }
    }
    else{
        echo "<h3> NO USER LOGGED IN </h3></div>";
    }
    $users = getUsers();
    echo "<div style=\"padding-top:50px;\"></div>
  <div id=\"addUserGroupModal\" class=\"modal fade\" role=\"dialog\">
      <!-- Modal content -->
    <div class=\"modal-dialog\">
      <div class=\"modal-content\">
        <div class=\"modal-header\">
          <h4 id=\"addUtoGHeader\" class=\"modal-title\">Add User to Group</h4>
            <button type=\"button\" id=\"addUtoGBut\" class=\"close\" data-dismiss=\"modal\">&times;</button>
        </div>
         <form id=\"AddUserModalForm\" name=\"AddUserGroupModalForm\" class=\"\" method=\"post\">
            <div class=\"modal-body\">
                <br>
                Which User? &nbsp;
                <select class=\"form-control\" id=\"dropdownUser\" class=\"user-select\" name=\"user\">";
                    foreach($users as $user){
                        echo "<option value =\"".$user['UID']."\">".$user['first_name'] . " ". $user['last_name'] . " </option>";
                    }
                    echo"
                </select>
                Will they be a Leader? &nbsp;
                <select class=\"form-control\" id=\"dropdownLeader\" class=\"leader-select\" name=\"leader\">
                  <option value=\"0\">No</option>
                  <option value=\"1\">Yes</option>
                </select>
                What Group?
                 <select class=\"form-control\" id=\"dropdownUser\" class=\"user-select\" name=\"group\">";
                $AllGroups = getAllGroups();
                foreach ($AllGroups as $group){
                    echo "<option value =\"".$group['UID']."\">".$group['name']."</option>";
                }
                echo "
                </select>
              </div>
              <div class=\"modal-footer\">
                <input id=\"SubmitUserGroup\" type=\"submit\" name=\"addUserGroupSub\" value=\"Add User\" class=\"btn btn-success\">
              </div>
          </form>

      </div>
    </div>
  </div>";

    echo "
      <div id=\"addGroupModal\" class=\"modal fade\" role=\"dialog\">
      <!-- Modal content -->
        <div class=\"modal-dialog\">
          <div class=\"modal-content\">
            <div class=\"modal-header\">
              <h4 id=\"AddGroupHead\" class=\"modal-title\">Add Group</h4>
              <button type=\"button\" id=\"addGExit\" class=\"close\" data-dismiss=\"modal\">&times;</button>
            </div>
            <form id=\"addModalForm\" name=\"addGroupModalForm\" class=\"\"  method=\"post\">
              <div class=\"modal-body\">
                <br>
                Group Name: &nbsp;
                <input class=\"form-control\" id=\"group_name\" type=\"text\" name=\"group_name\" value=\"\"><br>
              </div>
              <div class=\"modal-footer\">
                <input id=\"AddGroup\" type=\"submit\" name=\"addGroupSub\" value=\"Add Group\" class=\"btn btn-success\">
              </div>
            </form>
          </div>
        </div>
      </div>
    ";
    ?>
</div>
<?php
    include('../../views/footer.php');
?>
