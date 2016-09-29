from abc import ABCMeta
from abc import abstractmethod

from wordpress_xmlrpc import Client
from wordpress_xmlrpc import WordPressPost
from wordpress_xmlrpc.methods.posts import GetPosts
from wordpress_xmlrpc.methods.posts import NewPost
from wordpress_xmlrpc.methods.users import GetUserInfo

USERNAME = 'soundcloud_admin'
PASSWORD = 'soundcloud_admin'


wp = Client('http://hellaslaps.com/xmlrpc.php', USERNAME, PASSWORD)


class Builder(object):

    __meta__ = ABCMeta


    @abstractmethod
    def build(self):
        raise NotImplementedError


class SoundCloudWidgetBuilder(Builder):

    _TEMPLATE = '[soundcloud url="{url}" params="auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&visual=true" width="{width}" height="{height}" iframe="true" /]'

    def build(url, height, width):
        widget_str = self._TEMPLATE.format(
            url=url,
            height=height,
            width=width,
        )
        return widget_str


class PostBuilder(Builder):

    def build(self, title, content, categories=[], tags=[]):
        post = WordPressPost()
        post.title = title
        post.content = content
        post.terms_names = {
            'post_tag': tags,
            'category': categories,
        }
        post.post_status = 'publish'
        return NewPost(post)

post_builder = PostBuilder()

post = post_builder.build(title='Test', content='content yeet yah', categories=['1, 2'])
resp = wp.call(post)
print(resp)

