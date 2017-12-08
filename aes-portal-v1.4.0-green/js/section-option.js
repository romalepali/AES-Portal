function add_new()
{
    window.location.href='section-new.php';
}
function view_id(id)
{
    window.location.href='section-view.php?view_id='+id;
}
function delete_id(id)
{
    if(confirm('Are you sure you want to delete the data?'))
    {
        window.location.href='section.php?delete_id='+id;
    }
}