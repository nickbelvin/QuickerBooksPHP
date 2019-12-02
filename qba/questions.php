
<?php include('config.php'); ?>
<?php include('forgotpassword.php'); ?>

<?php $questions = getAllQuestions(); ?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>FORGOT PASSWORD :: QUICKER BOOKS</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <!-- Custome styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <style type="text/css">
    .wthree-field button.btn {
    background: #fc636b;
    border: none;
    color: #fff;
    padding: 11px 15px;
    text-transform: uppercase;
	  font-family: 'Mukta', sans-serif;
    font-size: 16px;
	width:100%;
	margin-top:10px;
    letter-spacing: 2px;
    cursor: pointer;
    transition: 0.5s all;
    -webkit-transition: 0.5s all;
    -moz-transition: 0.5s all;
    -o-transition: 0.5s all;
    -ms-transition: 0.5s all;
	border-radius: 35px;
	-webkit-border-radius: 35px;
	-moz-border-radius: 35px;
	-ms-border-radius: 35px;
	-o-border-radius: 35px;
}
.hide {     /* this will hide div with class div_class_name */
    display:none;
  }
</style>
  </head>
  
  <body> 
  
<?php include('navbar.php') ?>
  

    <div class="container" style="margin-bottom: 150px;">

          <br>
            <h4>Please select security questions to answer below</h4>

          <form class="form" action="questions.php" method="post" enctype="multipart/form-data">

            <hr>
            <!-- if editting user, we need that user's id -->
            <?php if ($isEditing === true): ?>
              <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
            <?php endif; ?>


            <?php if ($isEditing === true ): ?>
            <div class="">
              <label class="control-label">Username</label>
              <input type="text" name="username" value="<?php echo $username; ?>" class="form-control">
            </div>
            <?php endif; ?>
            

            <div class="form-group">
              <label class="control-label">Security Question #1</label>
              <select class="form-control" name="sq1" id="sq1">
                <option value="" ></option>
                <?php foreach ($questions as $question): ?>
                  <?php if ($question['id'] === $sq1): ?>
                    <option value="<?php echo $question['id'] ?>" selected><?php echo $question['description'] ?></option>
                  <?php else: ?>
                    <option value="<?php echo $question['id'] ?>"><?php echo $question['description'] ?></option>
                  <?php endif; ?>
                <?php endforeach; ?>
              </select> 
				<br><input name="a1" class="form-control" id="text1" type="text" value="" placeholder="Answer" required></br>		
            </div>
           

            <div class="form-group">
              <label class="control-label">Security Question #2</label>
              <select class="form-control" name="sq2" id="sq2">
                <option value="" ></option>
                <?php foreach ($questions as $question): ?>
                  <?php if ($question['id'] === $sq2): ?>
                    <option value="<?php echo $question['id'] ?>" selected><?php echo $question['description'] ?></option>
                  <?php else: ?>
                    <option value="<?php echo $question['id'] ?>"><?php echo $question['description'] ?></option>
                  <?php endif; ?>
                <?php endforeach; ?>
              </select>
				<br><input name="a2" class="form-control" id="text2" type="text" value="" placeholder="Answer" required></br>

            </div>
           
            <div class="form-group">
              <label class="control-label">Security Question #3</label>
              <select class="form-control" name="sq3" id="sq3">
                <option value="" ></option>
                <?php foreach ($questions as $question): ?>
                  <?php if ($question['id'] === $sq3): ?>
                    <option value="<?php echo $question['id'] ?>" selected><?php echo $question['description'] ?></option>
                  <?php else: ?>
                    <option value="<?php echo $question['id'] ?>"><?php echo $question['description'] ?></option>
                  <?php endif; ?>
                <?php endforeach; ?>
              </select>
		     	<br><input name="a3" class="form-control" id="text3" type="text" value="" placeholder="Answer" required></br>
            </div>
           


            <div class="form-group">
            <div class="wthree-field">
                <button type="submit" name="save_qtn" class="btn">Save</button>            
            </div>
          </form>
        </div>
      </div>
    </div>

<script src="Templates/Dashboard/bower_components/jquery/dist/jquery.min.js"></script>
<script src="Templates/Dashboard/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script>
$(document).on('change', 'select', function() {
//    $('option[value="disabled"]').prop('disabled', false);
    $(this).addClass('exception');
    $('option[value="' + this.value + '"]:not(.exception *)').prop('disabled', true);
    $(this).removeClass('exception');
});
</script>
