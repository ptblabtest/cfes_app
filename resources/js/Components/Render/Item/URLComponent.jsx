import React from "react";

const URLComponent = ({ url }) => {
    return (
        <a href={url} target="_blank" rel="noopener noreferrer">
            {url}
        </a>
    );
};

export default URLComponent;
