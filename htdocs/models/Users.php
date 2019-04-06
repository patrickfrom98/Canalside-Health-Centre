<?php

/**
 * A class that handles all operations relating
 * to users.
 *
 * @author Patrick Thompson
 * @version 05/03/2019
 */
class Users {
  /**
   * Adds user credentials to DB
   *
   * @param $username - the users username
   * @param $password - the users password
   */
  public static function addUser($username, $password) {
    $conn = DB::getConnection();
    $stmt = $conn->prepare("INSERT INTO mvc_user (user_id, username, password) VALUES (NULL, :username, :password)");
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':password', $password);
    $stmt->execute();
    DB::closeConnection($conn);
  }

  /**
   * Get user by username
   *
   * @param $username - the users username
   * @return array
   */
  public static function findByUsername($username) {
    $conn = DB::getConnection();
    $stmt = $conn->prepare("SELECT * FROM mvc_user WHERE mvc_user.username = :username");
    $stmt->bindValue(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch();
    DB::closeConnection($conn);
    return $user;
  }

  /**
   * Gets group of users based on role
   *
   * @param $role - the users role type. Eg. Patient
   * @return array
   */
  public static function getUserGroup($role) {
    $conn = DB::getConnection();
    $stmt = $conn->prepare("SELECT * FROM mvc_user INNER JOIN mvc_role ON mvc_user.user_id = mvc_role.user_id WHERE mvc_role.role = :role");
    $stmt->bindValue(':role', $role);
    $stmt->execute();
    $users = $stmt->fetchAll();
    DB::closeConnection($conn);
    return $users;
  }

  /**
   * Gets role of a user
   *
   * @param $id - users unique id
   * @return $role - the users system role
   */
  public static function getRole($id) {
    $conn = DB::getConnection();
    $stmt = $conn->prepare("SELECT * FROM mvc_role WHERE mvc_role.user_id = :id");
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    $role = $stmt->fetch();
    DB::closeConnection($conn);
    return $role;
  }

  /**
   * Sets user role
   *
   * @param $id - users id
   * @param $role - users role as a string
   */
  public static function setRole($id, $role) {
    $conn = DB::getConnection();
    $stmt = $conn->prepare("INSERT INTO mvc_role (user_id, role) VALUES (:id, :role)");
    $stmt->bindValue(':id',$id);
    $stmt->bindValue(':role',$role);
    $stmt->execute();
    DB::closeConnection($conn);
  }

  /**
   * Adds a user id to the patient table
   * which connects a user to a patient
   *
   * @param $userId - the users unique user_id
   * @param $patientId - the users unique patient_id
   */
  public static function connectToPatient($userId, $patientId) {
    $conn = DB::getConnection();
    $stmt = $conn->prepare("UPDATE mvc_patient SET user_id = :userId WHERE patient_id = :patientId");
    $stmt->bindValue(':userId', $userId);
    $stmt->bindValue(':patientId', $patientId);
    $stmt->execute();
    DB::closeConnection($conn);
  }
}

?>
