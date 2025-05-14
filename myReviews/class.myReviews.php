<?php
class ReviewsOperation
{
    public function makeDb()
    {

        $db = new SQLite3(GSDATAOTHERPATH . 'reviews.db');
        $db->exec("CREATE TABLE IF NOT EXISTS reviews (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    platform TEXT,
    rating TEXT,
    image TEXT,
    name TEXT,
    date_added TEXT,
    comments TEXT
    )");

    }

    public function createNew()
    {
        global $SITEURL;
        global $GSADMIN;

        $db = new SQLite3(GSDATAOTHERPATH . 'reviews.db');
        $stmt = $db->prepare("INSERT INTO reviews (platform, rating,image,name,date_added,comments) VALUES (:platform,:rating,:image,:name,:date_added,:comments)");
        $stmt->bindValue(':platform', $_POST['platform'], SQLITE3_TEXT);
        $stmt->bindValue(':rating', $_POST['rating'], SQLITE3_TEXT);
        $stmt->bindValue(':image', $_POST['image'], SQLITE3_TEXT);
        $stmt->bindValue(':name', $_POST['name'], SQLITE3_TEXT);
        $stmt->bindValue(':date_added', $_POST['date_added'], SQLITE3_TEXT);
        $stmt->bindValue(':comments', $_POST['comments'], SQLITE3_TEXT);
        $stmt->execute();
        $db->close();

        $redirect_url = $SITEURL . $GSADMIN . '/load.php?id=myReviews&list';
        echo "<meta http-equiv='refresh' content='0;url=$redirect_url'>";
    }


    public function edit()
    {

        $db = new SQLite3(filename: GSDATAOTHERPATH . 'reviews.db');
        $stmt = $db->prepare("UPDATE  reviews SET platform = :platform , rating = :rating ,image=:image,name = :name,date_added = :date_added ,comments = :comments  WHERE id = :id");

        $edit_id = (int) $_GET['edit'];
        $stmt->bindValue(':id', $edit_id, SQLITE3_INTEGER);
        $stmt->bindValue(':platform', $_POST['platform'], SQLITE3_TEXT);
        $stmt->bindValue(':rating', $_POST['rating'], SQLITE3_TEXT);
        $stmt->bindValue(':image', $_POST['image'], SQLITE3_TEXT);
        $stmt->bindValue(':name', $_POST['name'], SQLITE3_TEXT);
        $stmt->bindValue(':date_added', $_POST['date_added'], SQLITE3_TEXT);
        $stmt->bindValue(':comments', $_POST['comments'], SQLITE3_TEXT);
        $stmt->execute();
        $db->close();

        global $SITEURL;
        global $GSADMIN;

        $redirect_url = $SITEURL . $GSADMIN . '/load.php?id=myReviews&list';
        echo "<meta http-equiv='refresh' content='0;url=$redirect_url'>";
    }


    public function delete()
    {
        global $SITEURL;
        global $GSADMIN;


        $id = (int) $_GET['delete'];
        $db = new SQLite3(GSDATAOTHERPATH . 'reviews.db');
        $stmt = $db->prepare('DELETE FROM reviews WHERE id = :id');
        $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
        $stmt->execute();
        $db->close();

        $redirect_url = $SITEURL . $GSADMIN . '/load.php?id=myReviews&list';
        echo "<meta http-equiv='refresh' content='0;url=$redirect_url'>";
    }

    public function getInfo()
    {
        $db = new SQLite3(GSDATAOTHERPATH . 'reviews.db');
        $edit_id = (int) $_GET['edit'];
        $stmt = $db->prepare('SELECT * FROM reviews WHERE id = :id');
        $stmt->bindValue(':id', $edit_id, SQLITE3_INTEGER);
        $result = $stmt->execute();
        return $result->fetchArray(SQLITE3_ASSOC);
        $db->close();
    }

    public function list()
    {
        global $SITEURL;
        global $GSADMIN;

        $db = new SQLite3(filename: GSDATAOTHERPATH . 'reviews.db');
        $result = $db->query("SELECT * FROM reviews ORDER BY id DESC");

        echo '<table class="w3-table-all w3-card-4 ">
        <tr>
        <th style="height:40px;vertical-align:middle;">Name</th>
        <th style="height:40px;vertical-align:middle;">Platform</th>
        <th style="height:40px;vertical-align:middle;">Reviews</th>
        <th style="height:40px;vertical-align:middle;">Edit / Delete</th>
        </tr>';


        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            echo '
            <tr >
            <td style="vertical-align:middle;"><b>' . $row['name'] . '</b></td>
            <td style="vertical-align:middle;"><img style="width:20px" src="' . $SITEURL . 'plugins/myReviews/images/' . $row['platform'] . '-logo.png"></td>
            <td style="vertical-align:middle;"><img src="' . $SITEURL . 'plugins/myReviews/images/gg-star-' . $row['rating'] . '.png"></td>
            <td style="width:150px;vertical-align:middle"><a href="' . $SITEURL . $GSADMIN . '/load.php?id=myReviews&edit=' . $row['id'] . '" class="w3-button w3-round w3-tiny w3-orange" style="margin-right:5px;text-decoration:none;" >Edit</a>
            <a href="' . $SITEURL . $GSADMIN . '/load.php?id=myReviews&list&delete=' . $row['id'] . '" class="w3-button w3-round w3-tiny w3-red" style="text-decoration:none;" onclick="return confirm(`Are you sure?`);">Delete</a></td>
            </tr>
            ';
        }


        echo '</table>';

        $db->close();
    }

}
;