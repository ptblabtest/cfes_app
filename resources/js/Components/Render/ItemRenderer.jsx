import React from "react";
import DateComponent from "./Item/DateComponent";
import EmailComponent from "./Item/EmailComponent";
import URLComponent from "./Item/URLComponent";
import NumberComponent from "./Item/NumberComponent";
import CurrencyComponent from "./Item/CurrencyComponent";
import ListComponent from "./Item/ListComponent";
import FileComponent from "./Item/FileComponent";
import ImageComponent from "./Item/ImageComponent";
import ReadOnlyComponent from "./Item/ReadOnlyComponent";
import SelectComponent from "./Item/SelectComponent";
import BooleanComponent from "./Item/BooleanComponent";
import RoleComponent from "./Item/RoleComponent";
import TextComponent from "./Item/TextComponent";
import ModelComponent from "./Item/ModelComponent";
import RelatedItemComponent from "./Item/RelatedItemComponent";

const ItemRenderer = ({ item, fieldKey, fieldConfig, imageSize }) => {
    switch (fieldConfig.type) {
        case "model":
            return <ModelComponent modelPath={item[fieldKey]} />;
        case "text":
            return <TextComponent text={item[fieldKey]} />;
        case "textarea":
            return <TextComponent text={item[fieldKey]} />;
        case "date":
            return <DateComponent date={item[fieldKey]} />;
        case "email":
            return <EmailComponent email={item[fieldKey]} />;
        case "url":
            return <URLComponent url={item[fieldKey]} />;
        case "number":
            return <NumberComponent number={item[fieldKey]} />;
        case "currency":
            return <CurrencyComponent amount={item[fieldKey]} />;
        case "list":
            return <ListComponent list={item[fieldKey]} />;
        case "file":
            return <FileComponent fileUrl={item[fieldKey]} />;
        case "image":
            return <ImageComponent media={item.media} imageSize={imageSize} />;
        case "readonly":
            return <ReadOnlyComponent value={item[fieldKey]} />;
        case "select":
            return <SelectComponent value={item[fieldKey]} />;
        case "boolean":
            return <BooleanComponent value={item[fieldKey]} />;
        case "related":
            return (
                <RelatedItemComponent
                    item={item}
                    relationship={fieldConfig.relationship}
                    relationItem={fieldConfig.relation_item}
                />
            );
        case "role":
            return <RoleComponent item={item} options={fieldConfig.options} />;
        default:
            return <span>Unsupported field type</span>;
    }
};

export default ItemRenderer;
