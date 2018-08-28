/*
 *  editorObj - the editor variable
 */

// method to put data into editor
editorObj.setData('Test data');

// method to get data from editor
let editorData = editorObj.getData();
console.log(editorData);

// event listener for data change
editorObj.model.document.on('change:data', () => {
    console.log(editorObj.getData());
});