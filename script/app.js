function getChildElement(element, index) {
    let elementCount = 0;
    let child = element.firstChild;

    while (child) {
        if (child.nodeType == 1)  { // Node with nodeType 1 is an Element
            if (elementCount == index) {
                return child;
            }
            elementCount++;
        }
        child = child.nextSibling;
    }
}

document.getElementById("form_add_task").addEventListener("submit", function(e) {
    e.preventDefault();
    let xhr = new XMLHttpRequest();
    let add = new FormData(this);
    let area_task = document.getElementById('task');
    let date_task = document.getElementById('end_task');
    
    xhr.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            let res = this.response;
            if(res.success){

                if ("content" in document.createElement("template")) {

                    // create template
                    let template = document.querySelector("#display_task");
                    // select the parent wish will contain the template
                    let current_task = document.querySelector("#task_form");
                    // copy the template
                    let clone = document.importNode(template.content, true);

                    let the_task = clone.getElementById("the_task");
                    the_task.textContent = res.data.task;
                    let the_start = clone.getElementById("the_start");
                    the_start.textContent = res.data.start_task;
                    let the_end = clone.getElementById("the_end");
                    the_end.textContent = res.data.end_task;
                    let val = clone.getElementById("for_val");
                    val.value = res.data.id;
                    let del = clone.getElementById("for_del");
                    del.value = res.data.id;
                    current_task.appendChild(clone);
                  }

                area_task.value = '';
                date_task.value = '';
            }
        }else if(this.readyState == 4){
            alert('there is a prob');
        }
    }

    xhr.open('POST', 'task.php', true);
    xhr.responseType = 'json';
    xhr.send(add);
    return false;
});


document.body.addEventListener('click', function(e){
    
    if(e.target && e.target.id == 'for_val'){
        e.preventDefault();
        let xhr = new XMLHttpRequest();
        let id = e.target.value;
        let parent = e.target.parentElement.previousSibling.parentNode;
        let finished_task = getChildElement(parent, 0).textContent;
        let finished_start_task = getChildElement(parent, 1).textContent;
        let finished_end_task = getChildElement(parent, 2).textContent;
        let finished_data = { 'task' : finished_task  , 'start_task' : finished_start_task , 'end_task' : finished_end_task , 'id' : id  };
        
        let data = new FormData();
        data.append('validate', id);
    
        xhr.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            let res = this.response;
            if(res.success){
                if ("content" in document.createElement("template")) {
                    // create template
                    let template = document.querySelector("#display_finished_task");
                    // select the parent wish will contain the template
                    let display_finished_task = document.querySelector("#finished_task");
                    // copy the template
                    let clone = document.importNode(template.content, true);
                    let finished_task = clone.getElementById("the_finished_task");
                    finished_task.textContent = finished_data.task;
                    let finished_start = clone.getElementById("the_finished_start");
                    finished_start.textContent = finished_data.start_task;
                    let finished_end = clone.getElementById("the_finished_end");
                    finished_end.textContent = finished_data.end_task;
                    let del = clone.getElementById("finished_btn_del");
                    del.value = finished_data.id;
                    display_finished_task.appendChild(clone);
                    parent.remove();
                    }
                }
            }else if(this.readyState == 4){
                alert('there is a prob');
            }
        }
    
        xhr.open('POST', 'task.php', true);
        xhr.responseType = 'json';
        xhr.send(data);
        return false;
    }

    if(e.target && e.target.id == 'for_del'){
        e.preventDefault();
        let xhr = new XMLHttpRequest();
        let id = e.target.value;
        let parent = e.target.parentElement.previousSibling.parentNode;
        let data = new FormData();
        data.append('delete', id);
        
        xhr.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){
                let res = this.response;
                if(res.success){
                parent.remove();
                }else if(this.readyState == 4){
                    alert('there is a prob');
                }
            }
        }
        xhr.open('POST', 'task.php', true);
        xhr.responseType = 'json';
        xhr.send(data);
        return false;
    }

    if(e.target && e.target.id == 'finished_btn_del'){
        e.preventDefault();
        let xhr = new XMLHttpRequest();
        let id = e.target.value;
        let parent = e.target.parentElement.previousSibling.parentNode;
        let data = new FormData();
        data.append('delete', id);
        
        xhr.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){
                let res = this.response;
                if(res.success){
                parent.remove();
                }else if(this.readyState == 4){
                    alert('there is a prob');
                }
            }
        }
        xhr.open('POST', 'task.php', true);
        xhr.responseType = 'json';
        xhr.send(data);
        return false;
    }
});







