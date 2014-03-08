<?php
add_shortcode('multipage_form_sc','multipage_form');
function multipage_form() {
global $wpdb;
    $this_page  =   $_SERVER['REQUEST_URI'];
    $page   =   $_POST['page'];
if ( $page ==  NULL ) {
echo '<h3>Drop us a line!</h3>';

echo '<form method="post" action="' . $this_page .'">
    <label for="first_name" id="first_name">First Name:</label>
    <input type="text" name="first_name" id="first_name" required/>
    
    <label for="last_name" id="last_name">Last Name:</label>
    <input type="text" name="first_name" id="first_name" />
    
    <label for="email" id="email">Email:</label>
    <input type="text" name="email" id="first_name" required/>
    
    <input type="hidden" value="1" name="page" />
    
    <button type="submit" />Submit</button>
    
    </form>';
} //End Page 1 of Form

//Start Page 2 of Form

elseif ( $page == 1 ) {
    $first_name =   $_POST['first_name'];
    $last_name =    $_POST['last_name'];
    $email  =   $_POST['email'];

//Assign the table and inputs for INSERT function
$page_one_table = 'she_tech_inquiries';
$page_one_inputs = array(
    'first_name' => $first_name,
    'last_name' => $last_name,
    'email' => $email,
    'page' => $page
);

//insert data into new row
$insert_page_one = $wpdb->insert($page_one_table, $page_one_inputs);

//grab ID of row inserted
$form_id = $wpdb->insert_id;
echo '<h3>Please provide us with a little more info...</h3>';

echo '

<form method="post" action="' . $this_page . '">
<label for="inquiry" id="inquiry">Reason for contacting: </label><select name="inquiry" />
    <option value="0">Event Posting</option>
    <option value="1">Job Posting</option>
    <option value="2">Other</option>
</select>

<input type="hidden" name="page" value="2" />
<input type="hidden" name="form_id" value="' . $form_id . '" />
<button type="submit" />Submit</button>
</form>
';
} //End Page 2 of form

//Start Page 3 of form
elseif( $page == 2) {
    $inquiry = $_POST['inquiry'];
    $page = $_POST['page'];
    $form_id = $_POST['form_id'];
    
$page_two_table = 'she_tech_inquiries';
$page_two_inputs = array(
    'inquiry' => $inquiry,
    'page' => $page
);
$page_two_where = array(
    'id' => $form_id
    );

$insert_page_two = $wpdb->update($page_two_table, $page_two_inputs, $page_two_where);

echo '<form method="post" action="' . $this_page . '">
<label for="location" id="location">What is your reason for contacting She Tech Philly</label>
<select name="location" />
<option value="nothing" selected>""</option>
<option value="jobs">Job Posting</option>
<option value="events">Event Submission</option>
<option value="other">Other</option>
</select>
';

if ( $inquiry == 0 ) {
    echo
    '<label for="category" id="category">Reason</label>
    <select name="category" />
    <option value="nothing">"test"</option>
    <option value="2nd choice">"test1"</option>
    </select>';
}

if ( $inquiry == 1 ) {
    echo
    '<label for="category" id="category">Reason</label>
    <select name="category" />
    <option value="nothing">"test"</option>
    <option value="2nd choice">"test1"</option>
    </select>';
}

if ( $inquiry == 2 ) {
    echo
    '<label for="category" id="category">Reason</label>
    <select name="category" />
    <option value="nothing">"test"</option>
    <option value="2nd choice">"test1"</option>
    </select>';
}

echo '
<input type="hidden" value="3" name="page" />
<input type="hidden" value="' . $form_id . '" name="form_id:
/>

<button type="submit">Submit</button>
</form>';
}//End page 3 of form
//Page 4 of form
elseif (page == 3){
    $location = $_POST['location'];
    $category = $_POST['category'];
    $page = $_POST['page'];
    $form_id = $_POST['form_id'];
    
    $page_three_table = 'she_tech_inquiries';
    $page_three_inputs = array(
        'location' => $location,
        'categories' => $category,
        'page' => $page,
        );
    $page_three_where = array(
        'id' => $form_id
    );
    
    $insert_page_three = $wpdb->update($page_three_table, $page_three_inputs, $page_three_where);
    
    echo '<h3>Thanks so much!</h3>';
    echo '<p>Thanks for taking the time to contact She Tech Philly!</p>';
}//end page 4 form
} //End multipage_form() function


/* "sidebar" for donate button on home page */

function responsive_widget_init() {

        register_sidebar(array(
            'name' => __('Home Secondary Sidebar 1', 'responsive'),
            'description' => __('Home Secondary Sidebar 1 - sidebar.php', 'responsive'),
            'id' => 'main-secondary-1-sidebar',
            'before_title' => '<div class="widget-title">',
            'after_title' => '</div>',
            'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
            'after_widget' => '</div>'
        ));
        
//         register_sidebar(array(
//             'name' => __('Home Secondary Sidebar 2', 'responsive'),
//             'description' => __('Home Secondary Sidebar 2 - sidebar.php', 'responsive'),
//             'id' => 'main-secondary-2-sidebar',
//             'before_title' => '<div class="widget-title">',
//             'after_title' => '</div>',
//             'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
//             'after_widget' => '</div>'
//         ));
        
           }
	
    add_action('widgets_init', 'responsive_widget_init');
    
?>