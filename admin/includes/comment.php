<?php
Class Comment extends Db_object {
  protected static $db_table = 'comments';
  protected static $db_fields = ['id', 'user_id', 'photo_id', 'comment'];
}
$comment = new Comment();
