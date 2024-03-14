import React from 'react';

const SmallLabel = ({ text, url, urlLabel }) => {
  return (
    <small className="block text-gray-600">
      {text}
      {url && (
        <a
          href={url}
          target="_blank"
          rel="noopener noreferrer"
          className="text-blue-600 hover:text-blue-800"
        >
          {urlLabel || 'Click here'}
        </a>
      )}
    </small>
  );
};

export default SmallLabel;
