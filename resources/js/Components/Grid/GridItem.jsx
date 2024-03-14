import React from "react";
import ItemRenderer from "../Render/ItemRenderer";
import { Link } from "@inertiajs/react";

const GridItem = ({ item, fields, entity }) => {
    const imageSize = { width: "100%", height: "100%" };
    const placeholderImage =
        "https://upload.wikimedia.org/wikipedia/commons/a/ac/No_image_available.svg";
        const showUrl = `/${entity}/show/${item.id}`;


    return (
        <Link
            href={showUrl}
            className="group relative mt-6 bg-white shadow rounded-lg overflow-hidden"
        >
            <div className="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-50">
                <img
                    src={
                        item.media && item.media.length > 0
                            ? `/media/${item.media[0].id}/${item.media[0].file_name}`
                            : placeholderImage
                    }
                    alt="Item"
                    style={{ imageSize }}
                />
            </div>

            <div className="m-4 flex justify-between">
                <div>
                    {Object.keys(fields || {}).map((fieldKey, index) => {
                        if (fieldKey !== "image") {
                            return (
                                <div key={fieldKey}>
                                    {index === 0 ? (
                                        <h2 className="font-bold text-lg">
                                            <ItemRenderer
                                                item={item}
                                                fieldKey={fieldKey}
                                                fieldConfig={fields[fieldKey]}
                                            />
                                        </h2>
                                    ) : (
                                        <ItemRenderer
                                            item={item}
                                            fieldKey={fieldKey}
                                            fieldConfig={fields[fieldKey]}
                                        />
                                    )}
                                </div>
                            );
                        }
                        return null;
                    })}
                </div>
            </div>
        </Link>
    );
};

export default GridItem;
