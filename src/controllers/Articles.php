<?php

public function getArticles(){

        $query = '';

        if($this->id) {         
                $query = " AND p.id ='".$this->id."'";
        }

        $sql_query = "
                SELECT p.posts_id, p.title, p.message, p.category_id, u.first_name, u.last_name, p.status, p.created, p.updated, c.name AS category
                FROM ".$this->postTable." p
                LEFT JOIN ".$this->categoryTable." c ON c.id = p.category_id
                LEFT JOIN ".$this->userTable." u ON u.id = p.user_id
                WHERE p.status ='published' $query ORDER BY p.id DESC";
                
        $stmt = $this->conn->prepare($sql_query);                
        $stmt->execute();

        $result = $stmt->get_result();  
        return $result; 
}
