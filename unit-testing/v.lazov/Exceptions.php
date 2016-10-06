<?php

class InvalidNodeIndexException extends Exception {
  public function errorMessage() {
    return "The index of the node is invalid!";
  }
}

class NodeNotFoundException extends Exception {
  public function errorMessage() {
    return "Node text not found in the list.";
  }
}