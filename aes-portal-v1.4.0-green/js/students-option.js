function add_new()
{
    window.location.href='students-new.php';
}
function view_id(id)
{
    window.location.href='students-profile.php?view_id='+id;
}
function delete_id(id)
{
    if(confirm('Are you sure you want to delete the data?'))
    {
        window.location.href='students.php?delete_id='+id;
    }
}
function adviser(id)
{
    window.location.href='teachers-profile.php?view_id='+id;
}