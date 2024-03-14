import React, { useState, useEffect } from 'react';

const FileInput = ({ name, onChange, item }) => {
  const [filePreview, setFilePreview] = useState(null);

  useEffect(() => {
    // Assuming `item` has a property `media` that contains file information
    if (item && item.media) {
      const fileItem = item.media.find(media => media.collection_name === name);
      if (fileItem) {
        const fileUrl = `/media/${fileItem.id}/${fileItem.file_name}`;
        setFilePreview(fileUrl);
      }
    }
  }, [item, name]);

  const handleFileChange = (e) => {
    onChange(e); // Pass the event back up to the parent component

    const file = e.target.files[0];
    if (file) {
      // For general files, you might not display a preview directly but could do other logic here.
    }
  };

  return (
    <>
      <input
        id={name}
        type="file"
        name={name}
        onChange={handleFileChange}
        className="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
        aria-label={name}
        accept="file/*"
      />
      {filePreview && (
        <a href={filePreview} target="_blank" rel="noopener noreferrer" className="link">
          View uploaded file
        </a>
      )}
    </>
  );
};

export default FileInput;
