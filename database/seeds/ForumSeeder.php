<?php

use Illuminate\Database\Seeder;

use App\ForumCategory;
use App\Forum;

class ForumSeeder extends Seeder
{
    
    #protected $toTruncate = ['forum_categories', 'forums'];
    
    private function CreateCategory($name, $description, $priority, $parent_id=0)
    {
        return ForumCategory::Create([
            'parent_id' => $parent_id,
            'name' => $name,
            'description' => $description,
            'priority' => $priority
        ]);
    }
    
    private function CreateForum($name, $description, $priority, $category_id=0)
    {
        return Forum::Create([
            'category_id' => $category_id,
            'name' => $name,
            'description' => $description,
            'priority' => $priority
        ]);
    }
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        #foreach($this->toTruncate as $table) {
        #    DB::table($table)->truncate();
        #}
        
        
        // Parent forum categories
        $general = $this->CreateCategory('General', 'General Discussion', 10);
        $nost = $this->CreateCategory('Odyssey', 'Nostalrius - PvE - Alliance', 20);
        $offtopic = $this->CreateCategory('Off Topic', 'Random Discussion', 30);
        
        // Subcategories
        $public = $this->CreateCategory('Public', 'Public Discussion', 10, $nost->id);
        $guild = $this->CreateCategory('Guild', 'Member only discussion', 20, $nost->id);
        $officer = $this->CreateCategory('Officers', 'Officer Discussion', 30, $nost->id);
        
        // Forums - General
        $this->CreateForum('News and Announcements', 'Important information regarding this site', 10, $general->id);
        $this->CreateForum('Feature Requests', 'Let us know what you would like to see', 20, $general->id);
        $this->CreateForum('General Discussion', 'For discussion related to the site as a whole', 30, $general->id);
        
        // Public
        $this->CreateForum('Guild News', 'Important updates regarding the guild', 10, $public->id);
        $this->CreateForum('Public Discussion', 'All Welcome!', 20, $public->id);
        $this->CreateForum('Rules and Guidelines', 'Things you should read', 30, $public->id);
        
        // Guild
        $this->CreateForum('Member Discussion', 'Private discussion', 10, $guild->id);
        $this->CreateForum('Strategies', 'Collection of strategies to be used', 20, $guild->id);
        $this->CreateForum('Off Topic', 'Post whatever', 30, $guild->id);
        
        // Officer
        $this->CreateForum('Officer Discussion', 'Management Only', 10, $officer->id);
        $this->CreateForum('Applications', 'Applications posted here for discussion', 20, $officer->id);
        
        //Off Topic
        $this->CreateForum('Off Topic', 'Randomness Encouraged', 10, $offtopic->id);
    }
}
