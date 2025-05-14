<?php

if (isset($_GET['edit'])) {
    $grabInfo = $reviewOP->getInfo();
}; 

?>

<div class="w3-parent w3-container">
    <h3>Create / Edit Review </h3>

	<hr style="border:grey 1px solid">
	
    <a class="w3-button w3-round w3-blue w3-margin-bottom w3-margin-top" style="text-decoration: none;" href="<?php
    global $SITEURL;
    global $GSADMIN;
    echo $SITEURL . $GSADMIN . '/load.php?id=myReviews&list'; ?>
        ">Back to List</a>

    <hr>
	
    <form method="POST">

            <label for="">Name:</label>
        <input type="text" class="w3-input w3-show w3-margin-top w3-margin-bottom" <?php echo (isset($_GET['edit']) ? "value='{$grabInfo['name']}'" : ''); ?> name="name">

        <label for="">Image:</label>
        <input type="text" class="w3-input w3-show image" name="image" <?php echo (isset($_GET['edit']) ? "value='{$grabInfo['image']}'" : ''); ?>>

        <button class="w3-button w3-round w3-black w3-margin-top w3-margin-bottom addPhoto">Choose Image...</button>

        <label class="w3-show">Platform:</label>
        <select class="platform w3-input w3-show w3-margin-top w3-margin-bottom" name="platform">
            <option value="gg" <?php echo (isset($_GET['edit']) && $grabInfo['platform'] == 'gg' ? 'selected' : ''); ?>>
                Google
            </option>
            <option value="ta" <?php echo (isset($_GET['edit']) && $grabInfo['platform'] == 'ta' ? 'selected' : ''); ?>>
                Tripadvisor</option>
            <option value="fb" <?php echo (isset($_GET['edit']) && $grabInfo['platform'] == 'fb' ? 'selected' : ''); ?>>
                Facebook</option>
            <option value="my" <?php echo (isset($_GET['edit']) && $grabInfo['platform'] == 'my' ? 'selected' : ''); ?>>
                Custom</option>
        </select>

        <label for="">Rating:</label>
        <select name="rating" class="w3-input w3-show w3-margin-top w3-margin-bottom" id="">
            <option value="50" <?php echo (isset($_GET['edit']) && $grabInfo['rating'] == '50' ? 'selected' : ''); ?>>5
            </option>
            <option value="45" <?php echo (isset($_GET['edit']) && $grabInfo['rating'] == '45' ? 'selected' : ''); ?>>4.5
            </option>
            <option value="40" <?php echo (isset($_GET['edit']) && $grabInfo['rating'] == '40' ? 'selected' : ''); ?>>4
            </option>
            <option value="35" <?php echo (isset($_GET['edit']) && $grabInfo['rating'] == '35' ? 'selected' : ''); ?>>3.5
            </option>
        </select>



        <label for="" class="w3-block w3-margin-top w3-show">Date Added:</label>
        <input type="date" name="date_added" class="w3-margin-top w3-margin-bottom w3-input" <?php echo (isset($_GET['edit']) ? "value='{$grabInfo['date_added']}'" : ''); ?>>

        <label class="w3-text-bold" for="">Comments:</label>
        <textarea style="height:300px" name="comments"
            class="w3-show w3-input"><?php echo (isset($_GET['edit']) ? "{$grabInfo['comments']}" : ''); ?></textarea>

        <button type="submit" name="create" class="w3-button w3-round w3-green w3-margin-top">Save Review </button>
    </form>

</div>


<script>
    document.querySelector(".addPhoto").addEventListener("click", (e) => {
        e.preventDefault();
        window.open("<?php echo $SITEURL; ?>plugins/myReviews/filebrowser/imagebrowser.php?type=images&CKEditor=post-content&input=image",
            "", "left=10,top=10,width=960,height=500");
    });
</script>