import React from "react";

const RelatedItemComponent = ({ item, relationship, relationItem }) => {
    const relatedItem = item[relationship];
    const relatedValue = relatedItem ? relatedItem[relationItem] : "---";
    return <span>{relatedValue}</span>;
};

export default RelatedItemComponent;
