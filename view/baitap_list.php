<?php include('view/header.php') ?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="sass/jquery.funnyText.css" />

<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
	
<script type="text/javascript" src="sass/jquery.funnyText.js"></script>
<section id="list" class="list">
    <header class="list__row list__header">
        <h1 class=text2>
            Bài tập
        </h1>
        <form action="." method="get" id="list__header_select" class="list__header_select">
            <input type="hidden" name="action" value="list_assignments">
            <select name="course_id" required>
                <option value="0">Tất cả</option>
                <?php foreach ($courses as $course) : ?>
                <?php if ($course_id == $course['courseID']) { ?>
                <option value="<?= $course['courseID'] ?>" selected>
                    <?php } else { ?>
                <option value="<?= $course['courseID'] ?>"> 
                    <?php } ?>
                    <?= $course['courseName'] ?>
                </option>
                <?php endforeach; ?>
            </select>
            <button class="btn btn-light">Go</button>
        </form>
    </header>
    <?php if($assignments) { ?>
    <?php foreach ($assignments as $assignment) : ?>
    <div class="list__row">
        <div class="list__item">
            <p class="bold"><?= "{$assignment['courseName']}" ?></p>
            <p><?= $assignment['Description']; ?></p>
        </div>
        <div class="list__removeItem">
            <form action="." method="post">
                <input type="hidden" name="action" value="delete_assignment">
                <input type="hidden" name="assignment_id" value="<?= $assignment['ID']; ?>">
                <button class=" btn btn-outline-primary remove-button">❌</button>
            </form>
        </div>
    </div>
    <?php endforeach; ?>
    <?php } else { ?>
    <br>
    <?php if ($course_id) { ?>
    <p>Chưa có bài tập nào cho khóa học này.</p>
    <?php } else { ?>
    <p>Không có bài tập nào tồn tại</p>
    <?php } ?>
    <br>
    <?php } ?>
</section>

<section id="add" class="add">
    <h2 class="text1">Thêm bài tập</h2>
    <form action="." method="post" id="add__form" class="add__form">
        <input type="hidden" name="action" value="add_assignment">
        <div class="add__inputs">
            <label>Khóa học:</label>
            <select name="course_id" required>
                <option value="">Lựa chọn khóa học</option>
                <?php foreach ($courses as $course) : ?>
                <option value="<?= $course['courseID']; ?>">
                    <?= $course['courseName']; ?>
                </option>
                <?php endforeach; ?>
            </select>
            <label>Nội dung</label>
            <input type="text" name="description" maxlength="120" placeholder="Description" required>
        </div>
        <div class="add__addItem">
            <button class="btn btn-primary add-button bold">Thêm</button>
        </div>
    </form>
</section>
<br>
<p><a href=".?action=list_courses">Xem/Chỉnh sửa khóa học</a></p>
<script type="text/javascript">
		$(document).ready(function() {
			$('.text1').funnyText({
				
			});
            $('.text2').funnyText({
            });

		});
	</script>
<?php include('view/footer.php') ?>