#!/usr/bin/env ruby

require 'mysql'

word_count = {}

stop_words = "a,able,about,across,after,all,almost,also,am,among,an,and,any,are,as,at,be,because,been,but,by,can,cannot,could,dear,did,do,does,either,else,ever,every,for,from,get,got,had,has,have,he,her,hers,him,his,how,however,i,if,in,into,is,it,its,just,least,let,like,likely,may,me,might,most,must,my,neither,no,nor,not,of,off,often,on,only,or,other,our,own,rather,said,say,says,she,should,since,so,some,than,that,the,their,them,then,there,these,they,this,tis,to,too,twas,us,wants,was,we,were,what,when,where,which,while,who,whom,why,will,with,would,yet,you,your".split(',')

conn = Mysql.new('localhost', 'root', 'kaiser', 'kaiser')
conn.query('select content from media').each_hash do |result|
    result['content'].gsub(/[\x80-\xff]/, '').split.each do |word|

        word.downcase!

        next if stop_words.index(word)

        if word_count.has_key?(word)
            word_count[word] += 1
        else
            word_count[word] = 0
        end
    end
end

word_count.each do |word, count|
    puts "#{count} #{word}"
end
