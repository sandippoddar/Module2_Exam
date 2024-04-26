<?php
require_once __DIR__ . '/../database/Connection.php';

/**
 * Class Implements Query.
 */
class Query extends Connection {
  public function __construct() {
    Connection::__construct();
  }

  /**
   * Function to insert records when new User registered.
   * 
   * @param string $userName
   *  Stores Username of new User.
   * @param string $email
   *  Stores Email Id of new User.
   * @param string $password
   *  Stores Password in hash format.
   * 
   * @return void
   */
  public function insert(string $userName, string $password, string $type) {
    $sql = $this->conn->prepare("INSERT INTO User (UserName, Password, Role) VALUES(:userName, :password, :type)");
    $sql->execute(array(':userName' => $userName, ':password' => $password, ':type' => $type));
  }

  /**
   * Function to Login user by checking the Email ID or Username is Already
   * stored in the Database or not.
   * 
   * @param string $userEmail
   *  Stores the Data as per the User enter Username or Email.
   * 
   * @return array|bool
   */
  public function loginSelect (string $userEmail) {
    $sql = $this->conn->prepare("SELECT * FROM User WHERE UserName = :username");
    $sql->execute(array(':username' => $userEmail));
    $result = $sql->fetch(PDO::FETCH_ASSOC);
    if ($result != []) {
      return [$result['Password'],$result['Role']];
    }
    return FALSE;
  }

  /**
   * Function to Add records in Book Table.
   * 
   * @param string $image
   *  Stores Image of the User.
   * @param string $title
   *  Stores Title of the Book.
   * @param string $datePublish
   *  Srores date of publish of Book.
   * @param string $author
   *  Store Author name of Book.
   * @param string $ratings
   *  Store rating of book.
   * @param string $category
   *  Store Category of Book.
   * 
   * @return void
   */
  public function addBooks (string $image, string $title, string $datePublish, string $author, string $ratings, string $category) {
    $sql = $this->conn->prepare("INSERT INTO Book (poster_image, book_title, date_publication, author, ratings, category) VALUES(:image, :title, :datePublish, :author, :rate, :category)");
    $sql->execute(array(':image' => $image, ':title' => $title, ':datePublish' => $datePublish, ':author' => $author, ':rate' => $ratings, ':category' => $category));
  }

  /**
   * Function to Fetch Book details.
   * 
   * @return array
   *  Returns Array of Books.
   */
  public function fetchBooks () {
    $sql = $this->conn->prepare("SELECT * FROM Book ORDER BY Book_Id DESC LIMIT 2");
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  /**
   * Function to implement Load more feature.
   * 
   * @param int $countLoad
   *  Stores the Offset Value.
   * 
   * @return array
   *  Array contains Book details after Load more.
   */
  public function loadBook (int $countLoad) {
    $sql = $this->conn->prepare("SELECT * FROM Book ORDER BY Book_Id DESC LIMIT 2 OFFSET $countLoad");
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  /**
   * Function to check if the same user and book id is present in the wishlist Table.
   * 
   * @param string $user
   *  Stores username of User.
   * @param string $bookId
   *  Stores Book id.
   * 
   * @return bool
   *  Returns TRUE if User and Book id is present in the Wishlist table and
   *  FALSE if User and Book id is not present in the Wishlist table
   */
  public function isWishList (string $user, int $bookId) {
    $sql = $this->conn->prepare("SELECT * FROM wishlist WHERE user = :user AND BookId = :bookId");
    $sql->execute([':user' => $user, ':bookId' => $bookId]);
    if ($sql->rowCount() > 0) {
      return TRUE;
    }
    return FALSE;
  }

  /**
   * Function to insert record in wishlist Table.
   * 
   * @param string $user
   *  Stores username of User.
   * @param string $bookId
   *  Stores Book id.
   * 
   * @return void
   */
  public function insertWishlist (string $user, int $bookId) {
    $sql = $this->conn->prepare("INSERT INTO wishlist (user, BookId) VALUES(:user, :bookId)");
    $sql->execute([':user' => $user, ':bookId' => $bookId]);
  }

  /**
   * Function to fetch wishlist Table.
   * 
   * @param string $user
   *  Stores username of User.
   * 
   * @return array|bool
   *  Returns Array which contain Book details after join Book and wishlist
   *  table.
   */
  public function fetchCart(string $user) {
    $sql = $this->conn->prepare("SELECT Book.Book_Id,Book.book_title, Book.author, Book.date_publication FROM wishlist JOIN Book ON wishlist.BookId = Book.Book_Id WHERE wishlist.user = :user");
    $sql->execute([':user' => $user]);
    if ($sql->rowCount() > 0) {
      $result = $sql->fetchAll(PDO::FETCH_ASSOC);
      return $result;
    }
    else {
      return FALSE;
    }
  }

  public function removeWishList (string $user, int $bookId) {
    $sql = $this->conn->prepare("DELETE FROM wishlist WHERE user = '$user' AND BookId = $bookId");
    $sql->execute();
  }
}
