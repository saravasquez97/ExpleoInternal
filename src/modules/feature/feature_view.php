<?php
/**
 * Created by PhpStorm.
 * User: Nick Sladic
 * Date: 11/19/18
 * Time: 20:04
 */
include('../../views/header.php');
if(!isset($_SESSION))
{
    session_start();
}
//print("<pre>".print_r($_SESSION,true)."</pre>");
?>

<div style ="margin-top: 3rem" class = "container-fluid">
    <h2>Feature Loader</h2>
    <div style = "float: left" class = "group-btn">
        <button class = "btn btn-primary">Add Feature</button>
    </div>
    <form id="UpdateFeatures" name="UpdateFeatures" action="feature_controller.php" method="post">
        <table class="table table-sm">
            <thead class="thead-light">
            <tr>
                <th scope="col">Email</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Youtube Errors</th>
                <th scope="col">Google Map Errors</th>
                <th scope="col">Group Card Errors</th>
                <th scope="col">Profile Card Errors</th>
                <th scope="col">Profile Edit Errors</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($_SESSION['users'] as $user){ ?>
                <tr>
                    <th scope="row">
                        <input type="text"  name="userid[]" value="<?php echo $user[0]['UID'] ?>" style="display:none;">
                        <?php echo $user[0]['email']; ?>
                    </th>
                    <td>
                        <?php echo $user[0]['first_name']; ?>
                    </td>
                    <td>
                        <?php echo $user[0]['last_name']; ?>
                    </td>
                    <td>
                        <select type="text"  name="youtubeErrors[]">
                            <?php
                            foreach($_SESSION['youtube_errors'] as $yterr){?>
                                <option
                                    value = "<?php echo $yterr['id'] ?>"
                                    <?php

                                      if(!empty($user[1])){
                                          $ytcmp = $user[1][0];
                                          if($ytcmp['id'] == $yterr['id']){
                                              echo "selected";
                                          }

                                      }

                                    ?>>
                                    <?php echo $yterr['name'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </td>
                    <td>
                        <select type="text"  name="googleMapErrors[]">
                            <?php foreach($_SESSION['googlemap_errors'] as $gmerr){?>
                                <option
                                    value = "<?php echo $gmerr['id'] ?>"
                                    <?php
                                    if(!empty($user[1])){
                                        $gmcmp = $user[1][1];
                                        if($gmcmp['id'] == $gmerr['id']){
                                            echo "selected";
                                        }
                                    }
                                    ?>>
                                    <?php echo $gmerr['name'] ?>
                                </option>
                            <?php }?>
                        </select>
                    </td>
                    <td>
                        <select type="text"  name="groupCardErrors[]">
                            <?php
                            foreach($_SESSION['groupcard_errors'] as $gcerr){?>
                                <option
                                    value = "<?php echo $gcerr['id'] ?>"
                                    <?php

                                    if(!empty($user[1])){
                                        $gccmp = $user[1][2];
                                        if($gccmp['id'] == $gcerr['id']){
                                            echo "selected";
                                        }
                                    }
                                    ?>
                                    >
                                    <?php echo $gcerr['name'] ?>
                                </option>
                            <?php }?>
                        </select>
                    </td>
                    <td>
                        <select type="text"  name="profileCardErrors[]">
                            <?php foreach($_SESSION['profilecard_errors'] as $pferr){?>
                                <option
                                    value = "<?php echo $pferr['id'] ?>"
                                    <?php
                                    if(!empty($user[1])){
                                        $pccmp = $user[1][3];
                                        if($pccmp['id'] == $pferr['id']){
                                            echo "selected";
                                        }
                                    }
                                    ?>>
                                    <?php echo $pferr['name'] ?>
                                </option>
                            <?php }?>
                        </select>
                    </td>
                    <td>
                        <select type="text"  name="profileEditErrors[]">
                            <?php foreach($_SESSION['profileedit_errors'] as $peerr){?>
                                <option
                                    value = "<?php echo $peerr['id'] ?>"
                                    <?php
                                    if(!empty($user[1])){
                                        $procmp = $user[1][4];
                                        if($procmp['id'] == $peerr['id']){
                                            echo "selected";
                                        }
                                    }
                                    ?>>
                                    <?php echo $peerr['name'] ?>
                                </option>
                            <?php }?>
                        </select>
                    </td>
                </tr>
              <?php } ?>
            </tbody>
        </table>
        <div class = "group-btn">
            <button class = "btn btn-primary" name = 'apply' type = "submit">Apply</button>
        </div>
    </form>
</div>

<?php
    include('../../views/footer.php');
?>
