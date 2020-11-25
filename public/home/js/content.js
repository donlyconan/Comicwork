

void function selected(_class, index) {
    var children = document.getElementsByClassName(_class);
    for (child in children) {
        child.selectedIndex = index;
    }
};


void function selectByValue(_class, value) {
    if (value != null) {
        var elements = document.getElementsByClassName(_class);
        for (i = 0; i < elements.length; i++) {
            var child = elements[i];
            let index = child.options.findIndex(value);
            console.log(index, child);
            child.seletedItem = index;
        }
    }
}

