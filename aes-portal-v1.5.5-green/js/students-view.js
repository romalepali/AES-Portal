function update_id(id)
{
    if(confirm('Are you sure you want to change the data?'))
    {
        window.location.href='students-update.php?update_id='+id;
    }
}
function view_id(id)
{
    window.location.href='teachers-profile.php?view_id='+id;
}
function viewall_type(id)
{
    window.location.href='records-view-students.php?viewall_type='+id;
}
function upload_prof(id)
{
    window.location.href='upload-students.php?upload_prof='+id;
}