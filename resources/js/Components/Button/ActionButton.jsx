import React from 'react';

const ActionButton = ({ href, className, children }) => {
    return (
        <a href={href} className={className}>
            {children}
        </a>
    );
};

export default ActionButton;
