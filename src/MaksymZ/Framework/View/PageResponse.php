<?php
declare(strict_types=1);

namespace MaksymZ\Framework\View;

use MaksymZ\Framework\Http\Response\Html;

class PageResponse extends Html
{
    private \MaksymZ\Framework\View\Renderer $renderer;

    /**
     * @param \MaksymZ\Framework\View\Renderer $renderer
     */
    public function __construct(
        \MaksymZ\Framework\View\Renderer $renderer
    ) {
        $this->renderer = $renderer;
    }

    /**
     * @param string $contentBlockClass
     * @param string $template
     * @return PageResponse
     */
    public function setBody(string $contentBlockClass, string $template = ''): PageResponse
    {
        return parent::setBody((string) $this->renderer->setContent($contentBlockClass, $template));
    }
}