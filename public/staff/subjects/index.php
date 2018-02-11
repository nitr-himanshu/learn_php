<?php require_once ('../../../private/intialize.php') ?>
<?php
$subjects=[
['id'=>'1', 'position'=>'1','visible'=>'1' ,'menu_name'=>'About us'],
['id'=>'2', 'position'=>'2', 'visible'=>'1' ,'menu_name'=>'Student'],
['id'=>'3', 'position'=>'3', 'visible'=>'1' ,'menu_name'=>'Teachers'],
['id'=>'4', 'position'=>'4', 'visible'=>'1' ,'menu_name'=>'Commerical'],
];
?>
<?php $page_title = 'Subjects'; ?>
<?php include(SHARED_PATH.'/staff_header.php') ?>

<div id="content">
    <div class="subjects listing">
        <h1>Subjects</h1>
        <div class="actions">
            <a href="" class="action">Create new subject</a>
        </div>
        <table class="list">
            <tr>
                <th>ID</th>
                <th>Position</th>
                <th>Visible</th>
                <th>Name</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach($subjects as $subject){ ?>
                <tr>
                    <td><?php echo $subject['id']; ?></td>
                    <td><?php echo $subject['position']; ?></td>
                    <td><?php echo $subject['visible']==1?'true':'false';?></td>
                    <td><?php echo $subject['menu_name']; ?></td>
                    <td><a href="#" class="action">View</a> </td>
                    <td><a href="#" class="action">Edit</a> </td>
                    <td><a href="#" class="action">Delete</a> </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>

<?php include(SHARED_PATH.'/staff_footer.php') ?>
