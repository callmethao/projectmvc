<?php include('view/header.php') ?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
<script type="text/javascript" src="sass/jquery.funnyText.js"></script>
<link rel="stylesheet" type="text/css" href="sass/jquery.funnyText.css" />

<?php if($courses) { ?>

<section id="list" class="list">
    <header class="list__row list__header">
        <h1 class="text2">
            Danh sách khóa học
        </h1>
    </header>

    <?php foreach ($courses as $course) : ?>
    <div class="list__row">
        <div class="list__item">
            <p class="bold"><?= $course['courseName'] ?></p>
        </div>
        <div class="list__removeItem">
            <form action="." method="post">
                <input type="hidden" name="action" value="delete_course">
                <input type="hidden" name="course_id" value="<?= $course['courseID']; ?>">
                <button class="btn btn-outline-primary remove-button">❌</button>
            </form>
        </div>
    </div>
    <?php endforeach; ?>
</section>
<?php } else { ?>
<p>Không có mục nào tồn tại</p>
<?php } ?>

<section id="add" class="add">
    <h2 class="text1">Thêm khóa học</h2>
    <form action="." method="post" id="add__form" class="add__form">
        <input type="hidden" name="action" value="add_course">
        <div class="add__inputs">
            <label>Tên:</label>
            <input type="text" name="course_name" maxlength="30" placeholder="Name" autofocus required>
        </div>
        <div class="add__addItem">
            <button class="btn btn-primary add-button bold">Thêm</button>
        </div>
    </form>
</section>

<br>
<p><a href=".">Xem &amp; Thêm bài tập</a></p>
<script type="text/javascript">
		$(document).ready(function() {
			$('.text1').funnyText({
				
			});
            $('.text2').funnyText({
            });

		});
	</script>

<?php include('view/footer.php') ?>