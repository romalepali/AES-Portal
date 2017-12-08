function update_id(id)
{
    if(confirm('Are you sure you want to change the data?'))
    {
        window.location.href='section-update.php?update_id='+id;
    }
}
function view_id(id)
{
     window.location.href='section-view.php?view_id='+id;
}