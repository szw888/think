/**
 * Created with JetBrains PhpStorm.
 * User: Administrator
 * Date: 17-8-31
 * Time: 下午6:14
 * To change this template use File | Settings | File Templates.
 */
function confim(){
    if(confirm('确定要执行此操作吗？')){
        return true;
    }else{
        return false;
    }
}