<?php

// Config
$domain         = "http://localhost/biolinks";

// Database
$host           = '127.0.0.1';
$dbname         = 'biolinks';
$username       = 'root'; 
$password       = ''; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi ke database gagal: " . $e->getMessage());
}

function cek_status_member($username){
    global $pdo;

    try{
        $query = "SELECT status FROM User WHERE username = :username";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        $status = $stmt->fetchColumn();

        return $status;
    } catch (PDOException $e){
        error_log("Database error: " . $e->getMessage());
        return null;
    }
}

function save_profile($user_id, $name, $bio, $image){
    global $pdo;

    try {
        $query = "UPDATE profile SET name = :name, bio = :bio, image = :image WHERE user_id = :user_id";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':bio', $bio, PDO::PARAM_STR);
        $stmt->bindParam(':image', $image, PDO::PARAM_STR);
        $stmt->execute();

        return true;
    } catch (PDOException $e) {
        error_log("Database error: " . $e->getMessage());
        return false;
    }
}

function save_sosial_links($user_id, $sosial_links){
    global $pdo;

    $sosial_links_json = json_encode($sosial_links);

    try {
        $query = "UPDATE profile SET sosial_links = :sosial_links WHERE user_id = :user_id";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':sosial_links', $sosial_links_json, PDO::PARAM_STR);
        $stmt->execute();

        return true;
    } catch (PDOException $e) {
        error_log("Database error: " . $e->getMessage());
        return false;
    }
    
}

function save_other_links($user_id, $other_links){
    global $pdo;

    $other_links_json = json_encode($other_links);

    try {
        $query = "UPDATE profile SET other_links = :other_links WHERE user_id = :user_id";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':other_links', $other_links_json, PDO::PARAM_STR);
        $stmt->execute();

        return true;
    } catch (PDOException $e) {
        error_log("Database error: " . $e->getMessage());
        return false;
    }
}

function sign_in($username, $password){
    global $pdo;

    try {
        $query = "SELECT * FROM user WHERE username = :username AND password = :password";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', md5($password), PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            return $user;
        } else {
            return null;
        }
    } catch (PDOException $e) {
        error_log("Database error: " . $e->getMessage());
        return null;
    }
}

function sign_up_member($data){
    global $pdo;

    if (username_exists($data['username'])) {
        return false;
    }

    try {
        $query = "INSERT INTO user (username, email, password, created_at) VALUES (:username, :email, :pass, NOW())";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':username', $data['username'], PDO::PARAM_STR);
        $stmt->bindParam(':email', $data['email'], PDO::PARAM_STR);
        $stmt->bindParam(':pass', md5($data['password']), PDO::PARAM_STR);
        $stmt->execute();

        return true;
    } catch (PDOException $e) {
        error_log("Database error: " . $e->getMessage());
        return false;
    }
}

function username_exists($username) {
    global $pdo;

    try {
        $query_check = "SELECT COUNT(*) FROM user WHERE username = :username";
        $stmt_check = $pdo->prepare($query_check);
        $stmt_check->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt_check->execute();
        
        $username_exists = $stmt_check->fetchColumn();

        return $username_exists > 0;

    } catch (PDOException $e) {
        error_log("Database error: " . $e->getMessage());
        return false;
    }
}


function update_status_member($id, $status){
    global $pdo;

    try {
        $query = "UPDATE User SET status = :status WHERE id = :id";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':status', $status, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return true;
    } catch (PDOException $e) {
        error_log("Database error: " . $e->getMessage());
        return false;
    }
}

function create_member($data){
    global $pdo;

    $pdo->beginTransaction();

    if (username_exists($data['username'])) {
        return false;
    }

    try {

        $query = "INSERT INTO user (username, email, password, created_at) VALUES (:username, :email, :pass, NOW())";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':username', $data['username'], PDO::PARAM_STR);
        $stmt->bindParam(':email', $data['email'], PDO::PARAM_STR);
        $stmt->bindParam(':pass', md5($data['password']), PDO::PARAM_STR);
        $stmt->execute();

        $user_id = $pdo->lastInsertId();
        
        $query_profile = "INSERT INTO profile (user_id, name, bio, created_at) VALUES (:user_id, :name, :bio, NOW())";

        $stmt_profile = $pdo->prepare($query_profile);
        $stmt_profile->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        
        $name = $data['name'] != "" ? $data['name'] : null;
        $stmt_profile->bindParam(':name', $name, PDO::PARAM_STR);
        
        $bio = $data['bio'] != "" ? $data['bio'] : null;
        $stmt_profile->bindParam(':bio', $bio, PDO::PARAM_STR);


        $stmt_profile->execute();
        
        $pdo->commit();
        return true;

    } catch (PDOException $e) {
        $pdo->rollBack();
        error_log("Database error: " . $e->getMessage());
        return false;
    }
}

function create_profile($userId){
    global $pdo;

    try {
        $sql_check = "SELECT COUNT(*) FROM Profile WHERE user_id = :user_id";
        
        $stmt_check = $pdo->prepare($sql_check);
        $stmt_check->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt_check->execute();
        
        $existingCount = $stmt_check->fetchColumn();
        
        if ($existingCount > 0) {
            return false;
        }

        $query = "INSERT INTO profile (user_id, created_at) VALUES (:user_id, NOW())";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt->execute();

        return true;
    } catch (PDOException $e) {
        error_log("Database error: " . $e->getMessage());
        return false;
    }
}

function list_member() {
    global $pdo;

    try {
        $query = "
        SELECT 
            u.id,
            DATE_FORMAT(u.created_at, '%Y-%m-%d') as created_at,
            u.username, 
            u.status
        FROM 
            User u 
        LEFT JOIN 
            Profile p 
        ON 
            u.id = p.user_id 
        WHERE 
            u.deleted_at IS NULL AND u.role = 'user'
        ";

        $stmt = $pdo->query($query);
        $members = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $members;

    } catch (PDOException $e) {
        error_log("Database error: " . $e->getMessage());
        return [];
    }
}


function view_profile($userName) {
    global $pdo;

    try {
        $query = "
        SELECT 
            p.image, 
            p.name, 
            p.bio, 
            p.sosial_links, 
            p.other_links 
        FROM 
            Profile p 
        JOIN 
            User u 
        ON 
            p.user_id = u.id 
        WHERE 
            u.username = :username 
        AND 
            u.deleted_at IS NULL
        ";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':username', $userName, PDO::PARAM_STR);
        $stmt->execute();

        $profile = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($profile) {
            $sosialLinks = !empty($profile['sosial_links']) ? json_decode($profile['sosial_links'], true) : [];
            $otherLinks = !empty($profile['other_links']) ? json_decode($profile['other_links'], true) : [];

            return [
                'image' => $profile['image'],
                'name' => $profile['name'],
                'bio' => $profile['bio'],
                'sosial_links' => [
                    'twitter' => $sosialLinks['twitter'] ?? '',
                    'facebook' => $sosialLinks['facebook'] ?? '',
                    'instagram' => $sosialLinks['instagram'] ?? '',
                    'youtube' => $sosialLinks['youtube'] ?? '',
                    'tiktok' => $sosialLinks['tiktok'] ?? ''
                ],
                'other_links' => $otherLinks
            ];
        } else {
            // Return null if no profile found
            return null;
        }
    } catch (PDOException $e) {
        // Log error and return null
        error_log("Database error: " . $e->getMessage());
        return null;
    }
}
