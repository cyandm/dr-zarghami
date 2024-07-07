let mobileCategoryList = document.querySelector('#mobile-category-list');
if(mobileCategoryList){
let options = mobileCategoryList.querySelectorAll('option');

for (let i = 0; i < options.length; i++) {
    mobileCategoryList.addEventListener('change',function (){
        window.location = this.value;
    });
}
}