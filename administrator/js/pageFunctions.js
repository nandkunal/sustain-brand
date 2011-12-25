/**
 * Created by JetBrains PhpStorm.
 * User: Kunal
 * Date: 11/19/11
 * Time: 12:13 PM
 * To change this template use File | Settings | File Templates.
 */
function initSerachData()
{

	var url="common/search.php";
	$("#search_results").show();
$("search_results").load(url);
return false;
}
