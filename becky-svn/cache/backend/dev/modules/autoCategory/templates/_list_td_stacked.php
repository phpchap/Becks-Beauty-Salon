<td colspan="4">
  <?php echo __('%%id%% - %%name%% - %%group%% - %%display_order%%', array('%%id%%' => link_to($category->getId(), 'category_edit', $category), '%%name%%' => $category->getName(), '%%group%%' => $category->getGroup(), '%%display_order%%' => $category->getDisplayOrder()), 'messages') ?>
</td>
