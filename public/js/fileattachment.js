//filepond
const fileInput = document.querySelector('input[id="fileAttachment"]');
const fileIDInput = document.querySelector('input[name="fileid"]');


if(fileInput) {
    const pond = FilePond.create(fileInput, {
        server: {
            url: '/fileattachment/save',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            process: {
                    onload: (res) => {
                        let file = JSON.parse(res);
                        
                        fileIDInput.value = fileIDInput.value ? fileIDInput.value + ',' + file.id : file.id;
                }
            },

        }
    });
    // FilePond.setOptions();

    // const pond = FilePond.create( fileInput, {
    //     server: {
    //         url: `/fileattachment/upload/${fileInput.dataset.transactiontype}/${fileInput.dataset.transactionid}/${fileInput.dataset.userid}`,
    //         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, 
    //         process: {
    //             onload: (res) => {
    //                 let file = JSON.parse(res);
                    
    //                 //create element
    //                 let li = document.createElement('li');
    //                 li.classList.add('list-group-item');
    //                 li.innerHTML = `<a href="https://storage.googleapis.com/zwell/${file.transaction_type}/${file.filename}" target="_blank">${file.original_filename}</a>
    //                                 <a data-toggle="modal" data-target="#modalDeleteFileAttachment${file.id}" class="btn btn-sm btn-danger float-right"><i class="fas fa-trash"></i></a>
    //                                 `
    //                 li.innerHTML += deleteFileModal(file.id, file.original_filename);
    //                 fileAttachmentList.append(li);
    //             }
    //         },
            
    //     },
    //     allowRevert: false,
    // } );
}